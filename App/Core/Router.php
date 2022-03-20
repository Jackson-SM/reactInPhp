<?php

namespace App\Core;

use App\Model\CrudUser;
use App\Model\User;

session_start();

class Router {

  public function index($data){
    (new Controller())->viewTwig('templates/Index/index.twig.html', [
      'title' => 'Index'
    ]);
  }

  public function home($data){
    $crudUser = new CrudUser();
    $user = false;
    if(isset($_SESSION['id_session'])){
      $user = $crudUser->getUser($_SESSION['id_session']);
    }
    (new Controller())->viewTwig('templates/Home/home.twig.html', [
      'title' => "Home",
      'user' => $user
    ]);
  }

  public function login($data){
    (new Controller())->viewTwig("templates/Login/login.twig.html", [
      'title' => "Login"
    ]);
  }
  public function loginPost($data){
    $user = new User();
    $user->setEmail($data['email']);
    $user->setPassword($data['password']);

    $crudUser = new CrudUser();
    try {
      $crudUser->login($user);
      header('location: /home');
    }catch(\Exception $e){
      echo $e->getMessage();
    }
  }

  public function register($data){
    (new Controller())->viewTwig("templates/Register/register.twig.html", ['title' => "Register"]);
  }

  public function registerPost($data){
    $user = new User();
    $user->setEmail($data['email']);
    $user->setName($data['name']);
    $user->setPassword($data['password']);

    $crudUser = new CrudUser();

    $crudUser->create($user);
  }

  public function logout($data){
    $crudUser = new CrudUser();
    $crudUser->logout();
  }

  public function error($data){
    echo "<h1>Erro: {$data['errcode']}</h1>";
    var_dump($data);
  }
}