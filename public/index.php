<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../helper.php";
require basePath('config/default.php');



spl_autoload_register(function ($class) {
    $path = basePath("Framework/$class.php");
    if (file_exists($path)) {
        require $path;
    }
});
$config = require basePath('config/db.php');


$db = new Database($config);

$router = new Router();
$routes = require basePath("routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$method = $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);