

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar ventas

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar ventas</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="crear-venta">

          <button class="btn btn-success">

            Registrar Venta

          </button>

        </a>

        <button type="button" class="btn btn-default pull-right" id="daterange-btn">

            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Código factura</th>
           <th>Cliente</th>
           <th>Vendedor</th>
           <th>Forma de pago</th>
           <th>Neto</th>
           <th>Total</th>
           <th>Fecha</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>

        <?php

          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

          foreach ($respuesta as $key => $value) {


           echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["codigo"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                  echo '<td>'.$respuestaCliente["nombre"].'</td>';

                  $itemUsuario = "id";
                  $valorUsuario = $value["id_vendedor"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                  $neto = "<span class='conversorPrecio' data-toggle='modal' precio='".$value["neto"]."' data-target='#modalPrecio'>".number_format($value["neto"],2)."</span>";

                  $total = "<span class='conversorPrecio' data-toggle='modal' precio='".$value["total"]."' data-target='#modalPrecio'>".number_format($value["total"],2)."</span>";

                  echo '<td>'.$respuestaUsuario["nombre"].'</td>

                  <td>'.$value["metodo_pago"].'</td>

                  <td>$ '.$neto.'</td>

                  <td>$ '.$total.'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>

                    <div class="btn-group">

                      <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'"><i class="fa fa-print"></i></button>

                      <button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>

                    </div>

                  </td>

                </tr>';
            }

        ?>

        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>


      </div>

    </div>

  </section>

</div>

<!--=====================================
  MODAL PRECIO 
  ======================================-->

  <div id="modalPrecio" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Conversor Precio</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ETIQUETA PARA BTC -->

          <div class="form-group divisa">

            <label>BTC: </label>

            <span id="BTC"></span>

          </div>

          <!-- ETIQUETA PARA BSS -->

          <div class="form-group divisa">

            <label>BSS: </label>

            <span id="BSS"></span>

          </div>

          <!-- ETIQUETA PARA EUR -->

          <div class="form-group divisa">

            <label>EUR: </label>

            <span id="EUR"></span>

          </div>

          <!-- ETIQUETA PARA COP -->

          <div class="form-group divisa">

            <label>COP: </label>

            <span id="COP"></span>

          </div>

          <!-- ETIQUETA PARA CLP -->

          <div class="form-group divisa">

            <label>CLP: </label>

            <span id="CLP"></span>
          </div>

          <!-- ETIQUETA PARA UYU -->

          <div class="form-group divisa">

            <label>UYU: </label>

            <span id="UYU"></span>

          </div>

          <!-- ETIQUETA PARA BRL -->

          <div class="form-group divisa">

            <label>BRL: </label>

            <span id="BRL"></span>

          </div>

          <!-- ETIQUETA PARA PEN -->

          <div class="form-group divisa">

            <label>PEN: </label>

            <span id="PEN"></span>

          </div>

          <!-- ETIQUETA PARA ARS -->

          <div class="form-group divisa">

            <label>ARS: </label>

            <span id="ARS"></span>

          </div>

        </div>

      </div>         

      <!--=====================================
      PIE DEL MODAL
      ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Salir</button>

      </div>

    </div>

  </div>

</div>
