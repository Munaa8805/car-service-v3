<?php

$router->get("/", "HomeController@index");
$router->get("/about", "AboutController@index");
$router->get("/service", "ServiceController@index");
$router->get("/contact", "ContactController@index");



// Routes for authentication
$router->get("/auth/register", "UserController@create");
$router->get("/auth/login", "UserController@login");
$router->get("/detail", "UserController@detail");

// Routes for authentication
$router->post("/auth/register", "UserController@store");
$router->post("/auth/logout", "UserController@logout");
$router->post("/auth/login", "UserController@authenticate");