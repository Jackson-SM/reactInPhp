<?php

namespace App\Core;
use App\Controllers\UserController;

class Controller {

  public function verifyLogged(){
    $userController = new UserController();
    $user = false;
    if(isset($_SESSION['id_session'])){
      $user = $userController->getUser($_SESSION['id_session']);
    }
    return $user;
  }

  public function viewTwig(string $page, array $params = []){
    $loader = new \Twig\Loader\FilesystemLoader('App/View');

    $twig = new \Twig\Environment($loader);

    echo $twig->render($page,[
      ...$params,
      "user" => $this->verifyLogged()
    ]);
  }
}