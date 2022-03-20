<?php

namespace App\Core;
use App\Model\CrudUser;

class Controller {
  public function viewTwig(string $page, array $params = []){
    $loader = new \Twig\Loader\FilesystemLoader('App/View');

    $twig = new \Twig\Environment($loader);

    echo $twig->render($page,[
      ...$params,
      "user" => (new CrudUser())->getUser($_SESSION['id_session'])
    ]);
  }
}