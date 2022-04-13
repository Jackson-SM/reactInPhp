<?php

namespace App\Core;

use App\Controllers\UserController;
use App\Model\User;

use App\Controllers\PostController;
use App\Model\Post;

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

    $userController = new UserController();
    try {
      $userController->login($user);
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

    $userController = new UserController();

    $userController->create($user);
  }

  public function logout($data){
    $userController = new UserController();
    $userController->logout();
    header('location: /');
  }

  public function addNode($data) {
      $post = new Post();

      $post->setTitle($data['title']);
      $post->setContent($data['content']);
      $post->setAuthor($data['author']);
      $post->setIdUser($_SESSION['id_session']);

      if(isset($data['private'])){
        $post->setPrivate('on');
      }else{
        $post->setPrivate('off');
      }

      try {
        $postController = new PostController();
        echo $postController->create($post);
      }catch(\Exception $e){
        echo json_encode($e->getMessage());
      }
  }

  public function error($data){
    echo $data['errcode'];
  }
}