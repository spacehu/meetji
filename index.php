<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:GET,HEAD,POST,PUT,DELETE');
header('Access-Control-Allow-Headers: X-Requested-With,content-type,token,applation,openid,channel_code');
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}
date_default_timezone_set('PRC');
include_once('env.php');
include_once('./mod/init.php');
include_once('./mod/autoload.php');
$config = include_once('./config/config.php');
$run = new mod\init($config);
$run->run();
