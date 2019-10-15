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

  /*=============================================
	ACTUALIZAR DIVISAS
	=============================================*/

	static public function ctrActualizarDivisas(){

		if(isset($_GET["act"])){

			$data = json_decode( file_get_contents('https://api.yadio.io/json'), true );

			$BTC = $data['BTC']['price'];
			$BSF = $data['USD']['rate'];			
			$EUR = $data['USD']['EUR'];
			$COP = $data['USD']['COP'];
			$CLP = $data['USD']['CLP'];
			$UYU = $data['USD']['UYU'];
			$BRL = $data['USD']['BRL'];
			$PEN = $data['USD']['PEN'];
			$ARS = $data['USD']['ARS'];

			$tabla = "divisas";

			$datos = array("BTC"=>$BTC,
						   "BSF"=>$BSF,
						   "EUR"=>$EUR,
						   "COP"=>$COP,
						   "CLP"=>$CLP,
						   "UYU"=>$UYU,
						   "BRL"=>$BRL,
						   "PEN"=>$PEN,
						   "ARS"=>$ARS);

			$respuesta = ModeloDivisas::mdlActualizarDivisas($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Las Divisas fueron actualizadas con éxito",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "divisas";

								}
							})

				</script>';

			}

		}

	}	

}
