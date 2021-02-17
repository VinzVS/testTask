<?php
require_once  dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/config/routes.php';
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#", "", $app_path);
$app_path = str_replace('/public/','', $app_path);
define("PATH", $app_path);
new \core\App();
