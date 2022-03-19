<?php

require_once '../../vendor/autoload.php';

session_start();

use App\Model\User;
use App\Model\CrudUser;

if(isset($_POST['btn_login'])){
  $user = new User();
  $crudUser = new CrudUser();

  $user->setEmail($_POST['email']);
  $user->setPassword($_POST['password']);

  try {
    $data = $crudUser->login($user);
  }catch(Exception $e) {
    echo $e->getMessage();
  }
}