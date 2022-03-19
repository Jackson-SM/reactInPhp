<?php

namespace App\Core;

class Router {
  public function home($data){
    require __DIR__."/../View/templates/Home/home.twig.html";
  }

  public function login($data){
    require __DIR__."/../View/templates/login.html";
  }

  public function register($data){
    require __DIR__."/../View/templates/register.html";
  }

  public function homeTwig($data) {
    require __DIR__."/../../index.php";
  }

  public function error($data){
    echo "<h1>Erro: {$data['errcode']}</h1>";
    var_dump($data);
  }
}