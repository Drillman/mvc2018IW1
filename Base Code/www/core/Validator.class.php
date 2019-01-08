<?php
class Validator{

  public function __construct( $config, $data)
  {
    if($count($data) != count($config["data"])){
      die("Tentative : faille XSS");
    }

    foreach ($config["data"] as $name => $info) {

      if(!isset($data[$name])){
        die();
      }else{
        if(self::isEmpty($data[$name]) && $info["required"]??false){

        }
      }
    }
  }

  public static function isEmpty($string){
    return empty(trim($string));
  }

  public static function minLength($string, $length){
    return strlen(trim($string)) >= $length;
  }

  public static function maxLength($string, $length){
    return strlen(trim($string)) <= $length;
  }

  public static function checkPassword($string){
    return preg_match();
  }
}
