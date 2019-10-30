<div class="content-wrapper">

    <section class="content-header">

      <h1>
      Productos

      </h1>

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Administrar Productos</li>
      </ol>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <?php if($_SESSION["perfil"] !="Vendedor"){ ?>
            <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProducto" >
              Registrar Producto
            </button>
          <?php } ?>  
          <button type="button" class="btn btn-default pull-right btnImprimirStock">
            <span>
              <i class="fa fa-download"></i> Descargar Stock
            </span>
          </button>
        </div>

        <div class="box-body">

          <table class="table table-bordered dt-responsive tablas" width="100%">

            <thead>

              <tr>
                <th style="width:10px">#</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Agregado</th>
                <?php if($_SESSION["perfil"] =="Administrador"){ ?>
                  <th>Acciones</th>
                <?php } ?>  

              </tr>

            </thead>

            <tbody>
            <?php

            $item = null;
            $valor = null;
            $orden = "id";
            
            $productos = ControladorProductos::ctrMostrarProductos($item, $valor,$orden);

            foreach ($productos as $key => $value) {

              /*=============================================
               TRAEMOS LA IMAGEN
              =============================================*/
              $imagen = "<img src='".$value["imagen"]."' width='40px'>";

              /*=============================================
               TRAEMOS LA CATEGORÍA
              =============================================*/
              $item = "id";
              $valor = $value["id_categoria"];
              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

              /*=============================================
               STOCK
              =============================================*/

              if($value["stock"] <= 10){
                $stock = "<button class='btn btn-danger'>".$value["stock"]."</button>";
              }else if($value["stock"] > 11 && $value["stock"] <= 15){
                $stock = "<button class='btn btn-warning'>".$value["stock"]."</button>";
              }else{
                $stock = "<button class='btn btn-success'>".$value["stock"]."</button>";
              }
              
              $precio_compra = "<span class='conversorPrecio' data-toggle='modal' precio='".$value["precio_compra"]."' data-target='#modalPrecio'>".$value["precio_compra"]."</span>";
              
              $precio_venta = "<span class='conversorPrecio' data-toggle='modal' precio='".$value["precio_venta"]."' data-target='#modalPrecio'>".$value["precio_venta"]."</span>";

              /*=============================================
               TRAEMOS LAS ACCIONES
              =============================================*/

              $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$value["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$value["id"]."' codigo='".$value["codigo"]."' imagen='".$value["imagen"]."'><i class='fa fa-times'></i></button></div>";

              echo '<tr>

                  <td>'.($key+1).'</td>
                  <td>'.$imagen.'</td>
                  <td>'.$value["codigo"].'</td>
                  <td>'.$value["descripcion"].'</td>
                  <td>'.$categorias["categoria"].'</td>
                  <td>'.$stock.'</td>
                  <td>'.$precio_compra.'</td>
                  <td>'.$precio_venta.'</td>
                  <td>'.$value["fecha"].'</td>';

              if($_SESSION["perfil"] =="Administrador"){
                echo '<td>'.$botones.'</td>';
              }  

              echo '</tr>';              

            }

            ?>
            </tbody>

          </table>

        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!--=====================================
	MODAL AGREGAR PRODUCTO
	======================================-->

  <div id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#00a65a; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Registrar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>

                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Ingresar descripción" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-12 col-sm-6">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                    <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de compra" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-12 col-sm-6">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                    <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de venta" required>

                  </div>

                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">

                    <div class="form-group">

                      <label>

                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">

                    <div class="input-group">

                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-success">Guardar producto</button>

        </div>

      </form>

        <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

        ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Modificar Producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg"  name="editarCategoria" readonly required>

                  <option id="editarCategoria"></option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                    <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>

                  </div>

                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">

                    <div class="form-group">

                      <label>

                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">

                    <div class="input-group">

                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="editarImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar producto</button>

        </div>

      </form>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

        ?>

    </div>

  </div>

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

<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>      
