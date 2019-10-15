<?php

require_once "conexion.php";

class ModeloDivisas{	

  /*=============================================
	MOSTRAR DIVISAS
	=============================================*/

	static public function mdlMostrarDivisas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

  /*=============================================
	ACTUALIZAR DIVISAS
	=============================================*/

	static public function mdlActualizarDivisas($tabla, $datos){

		$stmt = Conexion::conectar()->
	            prepare("UPDATE $tabla SET valor=:BTC WHERE divisa = 'BTC'; 
	            	     UPDATE $tabla SET valor=:BSF WHERE divisa = 'BSF';
	            	     UPDATE $tabla SET valor=:EUR WHERE divisa = 'EUR';
	            	     UPDATE $tabla SET valor=:COP WHERE divisa = 'COP';
	            	     UPDATE $tabla SET valor=:CLP WHERE divisa = 'CLP';
	            	     UPDATE $tabla SET valor=:UYU WHERE divisa = 'UYU';
	            	     UPDATE $tabla SET valor=:BRL WHERE divisa = 'BRL';
	            	     UPDATE $tabla SET valor=:PEN WHERE divisa = 'PEN';
	            	     UPDATE $tabla SET valor=:ARS WHERE divisa = 'ARS'");

		$stmt -> bindParam(":BTC", $datos["BTC"], PDO::PARAM_STR);
		$stmt -> bindParam(":BSF", $datos["BSF"], PDO::PARAM_STR);
		$stmt -> bindParam(":EUR", $datos["EUR"], PDO::PARAM_STR);
		$stmt -> bindParam(":COP", $datos["COP"], PDO::PARAM_STR);
		$stmt -> bindParam(":CLP", $datos["CLP"], PDO::PARAM_STR);
		$stmt -> bindParam(":UYU", $datos["UYU"], PDO::PARAM_STR);
		$stmt -> bindParam(":BRL", $datos["BRL"], PDO::PARAM_STR);
		$stmt -> bindParam(":PEN", $datos["PEN"], PDO::PARAM_STR);
		$stmt -> bindParam(":ARS", $datos["ARS"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

}
