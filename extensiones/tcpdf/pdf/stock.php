<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

session_start();

class imprimirStock{

public function traerImpresionStock(){

//TRAEMOS LA INFORMACIÓN DEL STOCK

/*$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fecha = substr($respuestaVenta["fecha"],0,-8);
$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"],2);
$impuesto = number_format($respuestaVenta["impuesto"],2);
$total = number_format($respuestaVenta["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);*/

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/logo-negro-bloque.png"></td>

			<td style="background-color:white; width:180px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					NIT: 71.759.963-9

					<br>
					Dirección: Calle 44B 92-11

				</div>

			</td>

			<td style="background-color:white; width:180px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 300 786 52 49
					
					<br>
					ventas@inventorysystem.com

				</div>
				
			</td>

		</tr>

		<tr>
			
			<td style="background-color:white; width:540px;">

				<div style="font-size:16px; font-weight: bold; text-align:center; line-height:30px;">
					
					STOCK DE PRODUCTOS

				</div>

			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>                
            <th style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">Código</th>
            <th style="border: 1px solid #666; color:#333; background-color:white; width:280px; text-align:center">Descripción</th>
            <th style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">Stock</th>
            <th style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">Precio de compra</th>
            <th style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">Precio de venta</th>
        </tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

$item = null;
$valor = null;
$orden = "descripcion";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

foreach ($productos as $key => $item) {

	$codigo = $item["codigo"];
	$descripcion = $item["descripcion"];
	$stock = $item["stock"];
	$precio_compra = number_format($item["precio_compra"], 2);
	$precio_venta = number_format($item["precio_venta"], 2);

	$bloque3 = <<<EOF

		<table style="font-size:10px; padding:5px 10px;">			

			<tr>
				
				<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">
					$codigo
				</td>

				<td style="border: 1px solid #666; color:#333; background-color:white; width:280px; text-align:center">
					$descripcion
				</td>

				<td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
					$stock
				</td>

				<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">$ 
					$precio_compra
				</td>

				<td style="border: 1px solid #666; color:#333; background-color:white; width:70px; text-align:center">$ 
					$precio_venta
				</td>


			</tr>

		</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

}

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('stock.pdf', 'D');

}

}

$stock = new imprimirStock();;
$stock -> traerImpresionStock();

?>