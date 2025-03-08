<?php


$router->get("/", "controllers/home.php");
$router->get("/about", "controllers/about/index.php");
$router->get("/service", "controllers/service/index.php");
$router->get("/contact", "controllers/contact/index.php");






$router->get("/auth/register", "UserController@create");
$router->get("/auth/login", "UserController@login");