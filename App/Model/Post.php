<?php

namespace App\Model;

class Post {
  private $title,$content,$author,$id_user;

  public function setTitle($title){
    $this->title = $title;
  }
  public function getTitle(){
    return $this->title;
  }

  public function setContent($content){
    $this->content = $content;
  }
  public function getContent(){
     return $this->content;
  }

  public function setAuthor($author){
    $this->author = $author;
  }
  public function getAuthor(){
    return $this->author;
  }

  public function setIdUser($idUser){
    $this->id_user = $idUser;
  }
  public function getIdUser(){
    return $this->id_user;
  }
}