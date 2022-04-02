<?php

namespace App\Model;

class Connect {
  private static $instance;

  public static function getConnect(){
    if(!isset(self::$instance)){
      self::$instance = new \PDO("pgsql:host=localhost;port=5432;dbname=reactinphp","postgres", "123");
    }
    return self::$instance;
  }
}