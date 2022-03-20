<?php

namespace App\Core;

class Controller {
  public function viewTwig(string $page, array $params = []){
    $loader = new \Twig\Loader\FilesystemLoader('App/View');

    $twig = new \Twig\Environment($loader);

    echo $twig->render($page,$params);
  }
}