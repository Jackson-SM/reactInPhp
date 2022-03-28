<?php

require_once __DIR__."/../../vendor/autoload.php";

use CoffeeCode\Router\Router;
use App\Core\Controller;

$router = new Router(projectUrl: 'http://'.URL_BASE);

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

$router->group(group: "social");
$router->get("/", handler: "Router:social");

$router->group(group: 'user');
$router->get("/login", handler: "Router:login");
$router->post("/login", handler: "Router:loginPost");

$router->get("/register", handler: "Router:register");
$router->post("/register", handler: "Router:registerPost");

$router->group(group: 'logout');
$router->get('/', handler: "Router:logout");
/*
* ERRORS
*/

$router->group(group: "ooops");
$router->get("/{errcode}", handler: "Router:error");

$router->dispatch();


if($router->error()){
  $router->redirect("ooops/{$router->error()}");
}

?>