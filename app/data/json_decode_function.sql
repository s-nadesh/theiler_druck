/*JSON Decode*/
DELIMITER $$

DROP FUNCTION IF EXISTS `encode_xml`$$

CREATE  FUNCTION `encode_xml`(txt TEXT CHARSET utf8) RETURNS TEXT CHARSET utf8
    NO SQL
    DETERMINISTIC
    SQL SECURITY INVOKER
    COMMENT 'Encode (escape) given text for XML'
BEGIN
  SET txt := REPLACE(txt, '&', '&amp;');
  SET txt := REPLACE(txt, '<', '&lt;');
  SET txt := REPLACE(txt, '>', '&gt;');
  SET txt := REPLACE(txt, '"', '&quot;');
  SET txt := REPLACE(txt, '''', '&apos;');
  
  RETURN txt;
END$$

DELIMITER ;

DELIMITER $$


DROP FUNCTION IF EXISTS `extract_json_value`$$

CREATE  FUNCTION `extract_json_value`(
    json_text TEXT CHARSET utf8,
    xpath TEXT CHARSET utf8
) RETURNS TEXT CHARSET utf8
    MODIFIES SQL DATA
    DETERMINISTIC
    SQL SECURITY INVOKER
    COMMENT 'Extracts JSON value via XPath'
BEGIN
  RETURN ExtractValue(json_to_xml(json_text), xpath);	
END$$

DELIMITER ;

DELIMITER $$


DROP FUNCTION IF EXISTS `json_to_xml`$$

CREATE  FUNCTION `json_to_xml`(
    json_text TEXT CHARSET utf8
) RETURNS TEXT CHARSET utf8
    MODIFIES SQL DATA
    DETERMINISTIC
    SQL SECURITY INVOKER
    COMMENT 'Transforms JSON to XML'
BEGIN
    DECLARE v_from, v_old_from INT UNSIGNED;
    DECLARE v_token TEXT;
    DECLARE v_level INT;
    DECLARE v_state, expect_state VARCHAR(255);
    DECLARE _json_tokens_id INT UNSIGNED DEFAULT 0;
    DECLARE is_lvalue, is_rvalue TINYINT UNSIGNED;
    DECLARE scope_stack TEXT CHARSET ASCII;
    DECLARE xml TEXT CHARSET utf8;
    DECLARE xml_nodes, xml_node TEXT CHARSET utf8;
    
    SET json_text := trim_wspace(json_text);
    
    SET expect_state := 'object_begin';
    SET is_lvalue := TRUE;
    SET is_rvalue := FALSE;
    SET scope_stack := '';
    SET xml_nodes := '';
    SET xml_node := '';
    SET xml := '';
    get_token_loop: REPEAT 
        SET v_old_from = v_from;
        CALL _get_json_token(json_text, v_from, v_level, v_token, 1, v_state);
        SET _json_tokens_id := _json_tokens_id + 1;
        IF v_state = 'whitespace' THEN
          ITERATE get_token_loop;
        END IF;
        IF v_level < 0 THEN
          RETURN NULL;
          -- call throw('Negative nesting level found in _get_json_tokens');
        END IF;
        IF v_state = 'start' AND scope_stack = '' THEN
          LEAVE get_token_loop;
        END IF;
        IF FIND_IN_SET(v_state, expect_state) = 0 THEN
          RETURN NULL;
          -- call throw(CONCAT('Expected ', expect_state, '. Got ', v_state));
        END IF;
        IF v_state = 'array_end' AND LEFT(scope_stack, 1) = 'o' THEN
          RETURN NULL;
          -- call throw(CONCAT('Missing "}". Found ', v_state));
        END IF;
        IF v_state = 'object_end' AND LEFT(scope_stack, 1) = 'a' THEN
          RETURN NULL;
          -- call throw(CONCAT('Missing "]". Found ', v_state));
        END IF;
        IF v_state = 'alpha' AND LOWER(v_token) NOT IN ('true', 'false', 'null') THEN
          RETURN NULL;
          -- call throw(CONCAT('Unsupported literal: ', v_token));
        END IF;
        SET is_rvalue := FALSE;
        CASE 
          WHEN v_state = 'object_begin' THEN SET expect_state := 'string', scope_stack := CONCAT('o', scope_stack), is_lvalue := TRUE;
          WHEN v_state = 'array_begin' THEN SET expect_state := 'string,object_begin', scope_stack := CONCAT('a', scope_stack), is_lvalue := FALSE;
          WHEN v_state = 'string' AND is_lvalue THEN SET expect_state := 'colon', xml_node := v_token;
          WHEN v_state = 'colon' THEN SET expect_state := 'string,number,alpha,object_begin,array_begin', is_lvalue := FALSE;
          WHEN FIND_IN_SET(v_state, 'string,number,alpha') AND NOT is_lvalue THEN SET expect_state := 'comma,object_end,array_end', is_rvalue := TRUE;
          WHEN v_state = 'object_end' THEN SET expect_state := 'comma,object_end,array_end', scope_stack := SUBSTRING(scope_stack, 2);
          WHEN v_state = 'array_end' THEN SET expect_state := 'comma,object_end,array_end', scope_stack := SUBSTRING(scope_stack, 2);
          WHEN v_state = 'comma' AND LEFT(scope_stack, 1) = 'o' THEN SET expect_state := 'string', is_lvalue := TRUE;
          WHEN v_state = 'comma' AND LEFT(scope_stack, 1) = 'a' THEN SET expect_state := 'string,object_begin', is_lvalue := FALSE;
        END CASE;
        SET xml_node := unquote(xml_node);
        IF v_state = 'object_begin' THEN 
          IF SUBSTRING_INDEX(xml_nodes, ',', 1) != '' THEN
            SET xml := CONCAT(xml, '<', SUBSTRING_INDEX(xml_nodes, ',', 1), '>');
          END IF;
          SET xml_nodes := CONCAT(',', xml_nodes);
        END IF;
        IF v_state = 'string' AND is_lvalue THEN
          IF LEFT(xml_nodes, 1) = ',' THEN
            SET xml_nodes := CONCAT(xml_node, xml_nodes);
          ELSE
            SET xml_nodes := CONCAT(xml_node, SUBSTRING(xml_nodes, LOCATE(',', xml_nodes)));
          END IF;
        END IF;
        IF is_rvalue THEN
          SET xml := CONCAT(xml, '<', xml_node, '>', encode_xml(unquote(v_token)), '</', xml_node, '>');
        END IF;
        IF v_state = 'object_end' THEN 
          SET xml_nodes := SUBSTRING(xml_nodes, LOCATE(',', xml_nodes) + 1);
          IF SUBSTRING_INDEX(xml_nodes, ',', 1) != '' THEN
            SET xml := CONCAT(xml, '</', SUBSTRING_INDEX(xml_nodes, ',', 1), '>');
          END IF;
        END IF;
    UNTIL 
        v_old_from = v_from
    END REPEAT;
    RETURN xml;
END$$

DELIMITER ;

DELIMITER $$


DROP FUNCTION IF EXISTS `trim_wspace`$$

CREATE  FUNCTION `trim_wspace`(txt TEXT CHARSET utf8) RETURNS TEXT CHARSET utf8
    NO SQL
    DETERMINISTIC
    SQL SECURITY INVOKER
    COMMENT 'Trim whitespace characters on both sides'
BEGIN
  DECLARE len INT UNSIGNED DEFAULT 0;
  DECLARE done TINYINT UNSIGNED DEFAULT 0;
  IF txt IS NULL THEN
    RETURN txt;
  END IF;
  WHILE NOT done DO
    SET len := CHAR_LENGTH(txt);
    SET txt = TRIM(' ' FROM txt);
    SET txt = TRIM('\r' FROM txt);
    SET txt = TRIM('\n' FROM txt);
    SET txt = TRIM('\t' FROM txt);
    SET txt = TRIM('\b' FROM txt);
    IF CHAR_LENGTH(txt) = len THEN
      SET done := 1;
    END IF;
  END WHILE;
  RETURN txt;
END$$

DELIMITER ;

DELIMITER $$


DROP FUNCTION IF EXISTS `unquote`$$

CREATE  FUNCTION `unquote`(txt TEXT CHARSET utf8) RETURNS TEXT CHARSET utf8
    NO SQL
    DETERMINISTIC
    SQL SECURITY INVOKER
    COMMENT 'Unquotes a given text'
BEGIN
  DECLARE quoting_char VARCHAR(1) CHARSET utf8;
  DECLARE terminating_quote_escape_char VARCHAR(1) CHARSET utf8;
  DECLARE current_pos INT UNSIGNED;
  DECLARE end_quote_pos INT UNSIGNED;
  IF CHAR_LENGTH(txt) < 2 THEN
    RETURN txt;
  END IF;
  
  SET quoting_char := LEFT(txt, 1);
  IF NOT quoting_char IN ('''', '"', '`', '/') THEN
    RETURN txt;
  END IF;
  IF txt IN ('''''', '""', '``', '//') THEN
    RETURN '';
  END IF;
  
  SET current_pos := 1;
  terminating_quote_loop: WHILE current_pos > 0 DO
    SET current_pos := LOCATE(quoting_char, txt, current_pos + 1);
    IF current_pos = 0 THEN
      -- No terminating quote
      RETURN txt;
    END IF;
    IF SUBSTRING(txt, current_pos, 2) = REPEAT(quoting_char, 2) THEN
      SET current_pos := current_pos + 1;
      ITERATE terminating_quote_loop;
    END IF;
    SET terminating_quote_escape_char := SUBSTRING(txt, current_pos - 1, 1);
    IF (terminating_quote_escape_char = quoting_char) OR (terminating_quote_escape_char = '\\') THEN
      -- This isn't really a quote end: the quote is escaped. 
      -- We do nothing; just a trivial assignment.
      ITERATE terminating_quote_loop;
    END IF;
    -- Found terminating quote.
    LEAVE terminating_quote_loop;
  END WHILE;
  IF current_pos = CHAR_LENGTH(txt) THEN
      RETURN SUBSTRING(txt, 2, CHAR_LENGTH(txt) - 2);
    END IF;
  RETURN txt;
END$$

DELIMITER ;