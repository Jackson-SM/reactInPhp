<?php

require_once __DIR__."/../../vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(projectUrl: URL_BASE);

/*
* Controllers in App Controllers
*/

$router->namespace(namespace: "App\Core");

/*
* WEB
*home
*/
$router->group(group: null);
$router->get("/", handler: "Router:home");

$router->group(group: 'login');
$router->get("/", handler: "Router:login");

$router->group(group: 'register');
$router->get("/", handler: "Router:register");

$router->group(group: 'hometwig');
$router->get("/", handler: "Router:homeTwig");

/*
* ERRORS
*/

$router->group(group: "ooops");
$router->get("/{errcode}", handler: "Router:error");

$router->dispatch();

if($router->error()){
  $router->redirect("/ooops/{$router->error()}");
}

?>