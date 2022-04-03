<?php

namespace App\Controllers;

class PostController {
  public function create(\App\Model\Post $post){
    $sql = "INSERT INTO posts (title,content,author,id_user) VALUES (:title,:content,:author,:id_user)";

    $stmt = \App\Model\Connect::getConnect()->prepare($sql);
    $stmt->bindValue(':title', $post->getTitle());
    $stmt->bindValue(':content', $post->getContent());
    $stmt->bindValue(':author', $post->getAuthor());
    $stmt->bindValue(':id_user', $post->getIdUser());

    $stmt->execute();
  }
}