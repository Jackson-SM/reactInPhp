<?php

namespace App\Controllers;

class PostController {
  public function create(\App\Model\Post $post){
    $sql = "INSERT INTO posts (title,content,author,id_user,priv) VALUES (:title,:content,:author,:id_user,:priv)";

    $stmt = \App\Model\Connect::getConnect()->prepare($sql);
    $stmt->bindValue(':title', $post->getTitle());
    $stmt->bindValue(':content', $post->getContent());
    $stmt->bindValue(':author', $post->getAuthor());
    $stmt->bindValue(':id_user', $post->getIdUser());
    $stmt->bindValue(':priv', $post->getPrivate());

    if($stmt->execute()){
      return json_encode([
        "error" => false,
        "message" => "Post registrado com sucesso!!"
      ]);
    }else{
      return json_encode([
        "error" => true,
        "message" => "Post registrado com sucesso!"
      ]);
    }
  }

  public function read(){
    $sql = "SELECT * FROM posts";

    $stmt = \App\Model\Connect::getConnect()->prepare($sql);
    
    $stmt->execute();

    $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $data;
  }
}