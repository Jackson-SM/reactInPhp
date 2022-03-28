<?php

namespace App\Controllers;

use App\Model\User;
use App\Model\Connect;

class UserController {
  public function create(User $user) {
    if($this->verifyEmailExists($user) > 0){
      throw new \Exception("User already exists", 1);
    }else{
      $sql = "INSERT INTO users (email,name,password,img_profile) VALUES (:email,:name,:password,:img_profile)";

      $stmt = Connect::getConnect()->prepare($sql);
  
      $stmt->bindValue(':email', $user->getEmail());
      $stmt->bindValue(':name', $user->getName());
      $stmt->bindValue(':password', password_hash($user->getPassword(),PASSWORD_BCRYPT));
      $stmt->bindValue(':img_profile', $this->UploadImage($_FILES));
      
      $stmt->execute();  
    }
  }

  private function verifyPassword($password,$hash) {
    if(password_verify($password,$hash)){
      return true;
    }else{
      return false;
    }
  }

  private function verifyEmailExists(User $user) {
    $sql = "SELECT email FROM users WHERE email = :email";

    $stmt = Connect::getConnect()->prepare($sql);

    $stmt->bindValue(':email',$user->getEmail());

    $stmt->execute();

    return $stmt->rowCount();
  }

  public function login(User $user){
    if($this->verifyEmailExists($user) > 0){
      $sql = "SELECT * FROM users WHERE email = :email";

      $stmt = Connect::getConnect()->prepare($sql);

      $stmt->bindValue(":email", $user->getEmail());

      $stmt->execute();
    
      $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      if($this->verifyPassword($user->getPassword(),$data[0]['password'])){
        $_SESSION['logged'] = true;
        $_SESSION['id_session'] = $data[0]['id'];
      }else{
        throw new \Exception("Senha incorreta", 3);
      }
    }else{
      throw new \Exception("User does not exist", 2);
    }
  }

  public function logout(){
    session_unset();
    session_destroy();
  }

  public function getUser($id){
    if(isset($id)){
      $sql = "SELECT * FROM users WHERE id = :id";

      $stmt = Connect::getConnect()->prepare($sql);

      $stmt->bindValue(':id', $id);

      $stmt->execute();

      $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return $data[0];
    }
  }

  public function UploadImage(array $imgInfo){
    $extensionList = [
      "jpg" => "jpg",
      "png" => "png",
      "jpeg" => "jpeg"
    ];

    $extension = pathinfo($imgInfo['file']['name'], PATHINFO_EXTENSION);
    $newName = uniqid().'.'.$extension;
    if(in_array($extension,$extensionList)){
      if(!is_dir(DIRECTORY_USER)){
        mkdir(DIRECTORY_USER, 0777, true);
      }
      move_uploaded_file($imgInfo['file']['tmp_name'], DIRECTORY_USER.$newName);
    }else{
      echo "Formato não permitido";
    }
    return $newName;
  }
}