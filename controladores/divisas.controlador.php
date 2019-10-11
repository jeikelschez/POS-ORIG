<?php

class ControladorDivisas{  

  /*=============================================
	MOSTRAR DIVISAS
	=============================================*/

	static public function ctrMostrarDivisas($item, $valor){

		$tabla = "divisas";

		$respuesta = ModeloDivisas::mdlMostrarDivisas($tabla, $item, $valor);

		return $respuesta;

	}
}
