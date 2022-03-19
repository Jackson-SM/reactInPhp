<?php

namespace App\Controllers;

class Web {
  public function home($data){
    require __DIR__."/../View/pages/home.php";
  }

  public function login($data){
    require __DIR__."/../View/pages/login.php";
  }

  public function register($data){
    require __DIR__."/../View/pages/register.php";
  }

  public function error($data){
    echo "<h1>Erro: {$data['errcode']}</h1>";
    var_dump($data);
  }
}