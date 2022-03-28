<?php

namespace App\Core;

use App\Model\CrudUser;
use App\Model\User;

session_start();

class Router {

  public function __construct($router) {
    $this->router = $router;
  }

  public function home($data){
    (new Controller())->viewTwig('templates/Home/home.twig.html', [
      'title' => 'Home'
    ]);
  }

  public function social($data){
    (new Controller())->viewTwig('templates/Social/social.twig.html', [
      'title' => "Social"
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
      header('location: /');
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
    header('location: /');
  }

  public function error($data){
    echo $data['errcode'];
  }
}