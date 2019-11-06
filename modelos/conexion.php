<?php

class Conexion{

	static public function conectar(){

    $user = $_SESSION["preusuario"];
    
    if(!$user){
      $user = 'jrollin';
    }

		$link = new PDO("mysql:host=localhost;dbname=simgedic",
                      $user,

  						        "",
  						        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
  						        );
  		return $link;

	}

}
