<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

date_default_timezone_set('Asia/Yekaterinburg');

use fw\core\Router;

//$query = rtrim($_SERVER['QUERY_STRING'], '/');
$query = trim($_SERVER['REQUEST_URI'], '/');
$query = str_replace('?','&', $query);

define("DEBUG", 1);
define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/fw/core');
define('ROOT', dirname(__DIR__));
define('LIBS', dirname(__DIR__) . '/vendor/fw/libs');
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('LAYOUT', 'blog');
define('ADMIN', '/');

require '../vendor/fw/libs/functions.php';
require __DIR__ . '/../vendor/autoload.php';

/*spl_autoload_register(function($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});*/


new \fw\core\App;

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// defaults routs
    //Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
    //Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<action>[a-z-]+)?$', ['controller' => 'Main']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

//var_dump($query);
//var_dump(Router::getRoutes());
//var_dump(Router::matchRoute($query));


Router::dispatch($query);