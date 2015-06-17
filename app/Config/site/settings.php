<?php

define('SITE_NAME', 'Theiler Druck');
define('TIME_ZONE', 'Asia/Kolkata');
putenv('TZ=' . TIME_ZONE);
date_default_timezone_set(TIME_ZONE);
if (isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['REMOTE_ADDR'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "arkinfotec.in" || $_SERVER['HTTP_HOST'] == "demo.arkinfotec.in")) {
    define('LOCALHOST', 1);
} else {
    define('LOCALHOST', 0);
}

define('IPADDRESS', $_SERVER['REMOTE_ADDR']);

$whitelist = array('127.0.0.1', '::1');
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    $mailsendby = 'gmail';
} else {
    $mailsendby = '';
}

define('MAILSENDBY', $mailsendby);
define('SITEMAIL', 'nadesh@arkinfotec.com');

if (LOCALHOST) {
    define('DEBUG', 1);
    define('LOG', 1);
} else {
    define('DEBUG', 0);
    define('LOG', 1);
}

define('MINIFY_JS', 0);
if (LOCALHOST) {
    define('DOMAIN', 'http://' . $_SERVER['HTTP_HOST']);
    define('FOLDER', '/theiler_druck/branches/dev1/');
} else {
    define('DOMAIN', 'http://theiler.pandawebsolution.com');
    define('FOLDER', '/');
}

define('SITE_BASE_URL', DOMAIN . FOLDER);
define('WEB_ROOT_URL', SITE_BASE_URL . 'app/webroot/');
if (DEBUG) {
    error_reporting(E_ALL & ~E_STRICT);
    ini_set('display_errors', '1');
    ini_set('display_warnings', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
    ini_set('display_warnings', '0');
}
error_reporting(E_ALL & ~E_STRICT);
define('ERR_LOG', 'error.log');
define('PRODUCT_IMAGE_FOLDER', 'files/products/');
define('PRODUCT_IMAGE_RESIZE_FOLDER', 'files/products/resize/');

define('PROFILE_IMAGE_FOLDER', 'files/profile/');
define('PROFILE_IMAGE_RESIZE_FOLDER', 'files/profile/resize/');

define('CART_FILE_FOLDER', 'files/cart/');
define('ORDER_FILE_FOLDER', 'files/order/');

define('PHP_DATE_FORMAT', 'd.m.Y');
define('JS_DATE_FORMAT', 'dd.mm.yy');
define('DB_DATE_FORMAT', 'Y-m-d');

define('GOOD_FOR_PRINT_ON_PAPER', 6);
define('EXPRESS_WITHIN_4_DAYS', 450);

define('PAGE_IMAGE_FOLDER', 'files/pages/');
define('CONTACT_PERSON_IMAGE_FOLDER', 'files/contact_persons/');

define('ADMIN_ID', '1');
define('FROM_EMAIL', 'info@theilerdruck.ch');
define('EMAILHEADERIMAGE', 'img/theilerdrucklogo.png');
            
