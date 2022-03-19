<?php

require_once "../../vendor/autoload.php";

use App\Model\User;
use App\Model\CrudUser;

if(isset($_POST['btn_register'])){
  $user = new User();
  $crudUser = new CrudUser();

  $user->setEmail($_POST['email']);
  $user->setName($_POST['name']);
  $user->setPassword($_POST['password']);

  try{
    $crudUser->create($user);
    header("location: /");
  }catch(Exception $e){
    echo $e->getMessage();
    header("location: /");
  }
}