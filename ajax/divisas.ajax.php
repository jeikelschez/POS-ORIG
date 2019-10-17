<?php

require_once "../controladores/divisas.controlador.php";
require_once "../modelos/divisas.modelo.php";

class AjaxDivisas{

	/*=============================================
	TRAER PRECIOS
	=============================================*/

	public function ajaxTraerPrecios(){

		$item = null;
        $valor = null;

		$respuesta = ControladorDivisas::ctrMostrarDivisas($item, $valor);

		echo json_encode($respuesta);

	}

}

$categoria = new AjaxDivisas();
$categoria -> ajaxTraerPrecios();