<?php

class ControladorAuditoria{  

  /*=============================================
	MOSTRAR LOG AUDITORIA
	=============================================*/

	static public function ctrMostrarAuditoria($item, $valor){

		$tabla = "auditoria";

		$respuesta = ModeloAuditoria::mdlMostrarauditoria($tabla, $item, $valor);

		return $respuesta;

	}

}
