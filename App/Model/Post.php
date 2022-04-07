<?php

namespace App\Model;

class Post {
  private $title,$content,$author,$id_user,$private;

  public function setTitle(string $title){
    $this->title = $title;
  }
  public function getTitle(){
    return $this->title;
  }

  public function setContent(string $content){
    $this->content = $content;
  }
  public function getContent(){
     return $this->content;
  }

  public function setAuthor(string $author){
    $this->author = $author;
  }
  public function getAuthor(){
    return $this->author;
  }

  public function setIdUser(int $idUser){
    $this->id_user = $idUser;
  }
  public function getIdUser(){
    return $this->id_user;
  }
  public function setPrivate($private) {
    $this->private = $private;
  }
  public function getPrivate(){
    return $this->private;
  }
}