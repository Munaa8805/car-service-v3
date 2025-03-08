<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . "/../vendor/autoload.php";


use Framework\Router;
use Framework\Session;

Session::start();


require "../helper.php";
require basePath("/config/default.php");




// spl_autoload_register(function ($class) {
//     $path = basePath("Framework/$class.php");
//     if (file_exists($path)) {
//         require $path;
//     }
// });


$router = new Router();
$routes = require basePath("routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


$router->route($uri);