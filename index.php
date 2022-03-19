<?php

require_once __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(projectUrl: URL_BASE);

/*
* Controllers in App Controllers
*/

$router->namespace(namespace: "App\Controllers");

/*
* WEB
*home
*/
$router->group(group: null);
$router->get("/", handler: "Web:home");

$router->group(group: 'login');
$router->get("/", handler: "Web:login");

$router->group(group: 'register');
$router->get("/", handler: "Web:register");

/*
* ERRORS
*/

$router->group(group: "ooops");
$router->get("/{errcode}", handler: "Web:error");

$router->dispatch();

if($router->error()){
  $router->redirect("/ooops/{$router->error()}");
}

?>