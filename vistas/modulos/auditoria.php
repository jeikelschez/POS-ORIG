<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Log Auditoría
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li class="active">Log Auditoría</li>
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">

        <table class="table table-bordered dt-responsive tablas" width="100%">

          <thead>

            <tr>
              <th style="width:10px">#</th>
              <th>Tabla</th>
              <th>ID tabla</th>
              <th>Tipo</th>
              <th>Usuario</th>
              <th>Fecha</th>
            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $log = ControladorAuditoria::ctrMostrarAuditoria($item, $valor);

            foreach ($log as $key => $value) {

              echo '<tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["tabla"].'</td>
                      <td>'.$value["idtabla"].'</td>
                      <td>'.$value["tipo"].'</td>
                      <td>'.$value["usuario"].'</td>
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