<?php

namespace App\Core;

use App\Model\CrudUser;
use App\Model\User;

session_start();

class Router {
  public function home($data){
    (new Controller())->viewTwig('templates/Home/home.twig.html', [
      'title' => "Home",
      'sessionlog' => $_SESSION['logged'],
      'sessionid' => $_SESSION['id_session'],
      'user' => (new CrudUser())->getUser($_SESSION['id_session'])
    ]);
  }

  public function login($data){
    (new Controller())->viewTwig("templates/Login/login.twig", [
      'title' => "Login"
    ]);
  }
  public function loginPost($data){
    $user = new User();
    $user->setEmail($data['email']);
    $user->setPassword($data['password']);

    $crudUser = new CrudUser();
    $crudUser->login($user);

    header('location: /');
  }

  public function register($data){
    (new Controller())->viewTwig("templates/Register/register.twig", ['title' => "Register"]);
  }

  public function registerPost($data){
    $user = new User();
    $user->setEmail($data['email']);
    $user->setName($data['name']);
    $user->setPassword($data['password']);

    $crudUser = new CrudUser();

    $crudUser->create($user);
  }

  public function error($data){
    echo "<h1>Erro: {$data['errcode']}</h1>";
    var_dump($data);
  }
}