<?php

namespace App\Model;

class User {
  private $email,$name,$password;

  public function setEmail($email) {
    $this->email = filter_var($email,FILTER_SANITIZE_EMAIL);
  }

  public function getEmail(){
    return $this->email;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getName(){
    return $this->name;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPassword(){
    return $this->password;
  }
}