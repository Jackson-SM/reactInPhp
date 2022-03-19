<?php

namespace App\Model;

class Connect {
  private static $instance;

  public static function getConnect(){
    if(!isset(self::$instance)){
      self::$instance = new \PDO("mysql:host=localhost:3307;dbname=reactinphp;chartset=utf8","root", "");
    }
    return self::$instance;
  }
}