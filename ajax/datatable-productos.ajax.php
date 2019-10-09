<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class TablaProductos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/

	public function mostrarTablaProductos(){

      $item = null;
    	$valor = null;
			$orden = "id";
			
  		$productos = ControladorProductos::ctrMostrarProductos($item, $valor,$orden);

  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($productos); $i++){

        /*=============================================
 	 		   TRAEMOS LA IMAGEN
  			=============================================*/

        $imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";

        /*=============================================
 	 		   TRAEMOS LA CATEGORÍA
  			=============================================*/

		  	$item = "id";
		  	$valor = $productos[$i]["id_categoria"];

		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        /*=============================================
 	 		   STOCK
  			=============================================*/

  			if($productos[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

  			}else if($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

  			}

        $CBSF = number_format(($productos[$i]["precio_compra"] * 20000), 2);
        $CBTC = number_format(($productos[$i]["precio_compra"] / 8300), 6);
        $CETH = number_format(($productos[$i]["precio_compra"] / 1500), 6);
        $CPTR = number_format(($productos[$i]["precio_compra"] / 3520), 6);

        $compra_tt = 'BSF: ' . $CBSF . '\r\n' .
                     'BTC: ' . $CBTC . '\r\n' .
                     'ETH: ' . $CETH . '\r\n' .
                     'PTR: ' . $CPTR;

        $precio_compra = "<span data-toggle='tooltip' data-placement='top' title='".$compra_tt."'>".$productos[$i]["precio_compra"]."</span>";

        $VBSF = number_format(($productos[$i]["precio_venta"] * 20000), 2);
        $VBTC = number_format(($productos[$i]["precio_venta"] / 8300), 6);
        $VETH = number_format(($productos[$i]["precio_venta"] / 1500), 6);
        $VPTR = number_format(($productos[$i]["precio_venta"] / 3520), 6);

        $venta_tt =  'BSF: ' . $VBSF . '\r\n' .
                     'BTC: ' . $VBTC . '\r\n' .
                     'ETH: ' . $VETH . '\r\n' .
                     'PTR: ' . $VPTR;

        $precio_venta = "<span data-toggle='tooltip' data-placement='top' title='".$compra_tt."'>".$productos[$i]["precio_venta"]."</span>";

        /*=============================================
 	 		   TRAEMOS LAS ACCIONES
  			=============================================*/

		  	$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";

        $datosJson .='[
          "'.($i+1).'",
          "'.$imagen.'",
          "'.$productos[$i]["codigo"].'",
          "'.$productos[$i]["descripcion"].'",
          "'.$categorias["categoria"].'",
          "'.$stock.'",
          "'.$precio_compra.'",
          "'.$precio_venta.'",
          "'.$productos[$i]["fecha"].'",
          "'.$botones.'"
			    ],';

      }

      $datosJson = substr($datosJson, 0, -1);

     $datosJson .=   ']

     }';

    echo $datosJson;

	}


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();
