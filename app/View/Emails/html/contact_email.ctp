<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="2" style="padding:20px 20px 0 20px">
            <p style="color: #545454; font-size: 13px; line-height: 20px;">Dear Admin!</p>
        </td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate("Firstname"); ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['contact_firstname'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate("Lastname"); ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['contact_lastname'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate("Email"); ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['contact_email'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate("Subject"); ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['contact_regard'] ?></td>
    </tr>
    
    <tr>
        <td style="padding:20px 20px 0 20px"><?php echo MyClass::translate("Message"); ?>:</td>
        <td style="padding:20px 20px 0 20px"><?php echo $data['Page']['contact_message'] ?></td>
    </tr>
</table>