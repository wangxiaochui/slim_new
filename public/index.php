<?php
define('APP_PATH',__DIR__.'/../app');
require '../vendor/autoload.php';
require './autoload.php';
//composer里面psr4加载
/*$autoload = new Psr4Autoloader();
// register the autoloader
$autoload ->register();

// register the base directories for the namespace prefix
$autoload ->addNamespace('App\Controller', APP_PATH.'/controller');
$autoload ->addNamespace('App\Model', APP_PATH.'/model');
*/
$container = new \Slim\Container();
//var_dump($container['settings']);exit;
$config = require_once '../config/datebase.php';
$container['settings']['db'] = $config['settings']['db'];
require './dependencies.php';

$app = new \Slim\App($container);
require '../router.php';
$app->run();