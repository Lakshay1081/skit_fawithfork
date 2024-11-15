<?php
// Error reporting
error_reporting(0);
//session start
session_start();
//set dete default time zone
date_default_timezone_set('Asia/Kolkata');
// Database Configurations
define("HOST", "localhost");
define("USER", "root");
define("DATABASE", "db_sabjiwala");
define("PASS", "");

$path = "http://".$_SERVER['HTTP_HOST']."/skit_fawithfork/www.skitteacher.com";
$web = "http://".$_SERVER['HTTP_HOST']."/skit_fawithfork/www.teacheradmin.com";

// Base URL
define("BASEURL", $path);

// define site title
define('WEBURL', $web);

//define company name
define('COMPANY_NAME', "Sabjiwala");

//set auto referesh windows
define('AUTO_REFERESH_WIN_TIME', '5');

//Document Path
define('DOCUMENT_PATH', $path.'/public/storage');

//State Apis
define('STATE_APIs', 'http://api.nightlights.io/districts');

//Document Root
define('DOCUMENT_ROOT', '../public/storage/');

//image/file path
define('FILE_PATH', $path."/public/storage/");

//General Mailer Send
define('EMAIL', 'test@kistechnosoftware.in');
define('EMAIL_PASSWORD', 'Testing@#$$123');
define('EMAIL_HOST', 'mail.kistechnosoftware.in');
define('SMTPSecure', 'tsl');