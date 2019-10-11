<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Divisas
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li class="active">Administrar Divisas</li>
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoria" >
          Refrescar Divisas
        </button>
      </div>
      
      <div class="box-body">

        <table class="table table-bordered dt-responsive tablas" width="100%">

          <thead>

            <tr>
              <th style="width:10px">#</th>
              <th>Divisas</th>
              <th>Formula</th>
              <th>Valor</th>
              <th>Fecha</th>
            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $divisas = ControladorDivisas::ctrMostrarDivisas($item, $valor);

            foreach ($divisas as $key => $value) {

              echo '<tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["divisa"].'</td>
                      <td>'.$value["formula"].'</td>
                      <td>'.$value["valor"].'</td>
                      <td>'.$value["fecha"].'</td>
                    </tr>';
            }

             ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>