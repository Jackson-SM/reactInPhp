<?php

namespace App\Core;
use App\Model\CrudUser;

class Controller {

  public function verifyLoggedPage(){
    $logged = false;
    if(!isset($_SESSION['logged'])){
      return $logged;
    }else{
      $logged = true;
      return $logged;
    }
  }

  public function verifyLogged(){
    $crudUser = new CrudUser();
    $user = false;
    if(isset($_SESSION['id_session'])){
      $user = $crudUser->getUser($_SESSION['id_session']);
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

  public function redirect($url){
    header(`location: $url`);
  }
}