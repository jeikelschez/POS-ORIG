<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

      <li class="active">

        <a href="inicio">
          <i class="fa fa-home"></i>
          <span>INICIO</span>
        </a>

      </li>

      <li class="">

        <a href="usuarios">
          <i class="fa fa-user"></i>
          <span>Usuarios</span>
        </a>

      </li>

      <li>

				<a href="categorias">

					<i class="fa fa-th"></i>
					<span>Categorías</span>

				</a>

			</li>

			<li>

				<a href="productos">

					<i class="fa fa-dropbox"></i>
					<span>Productos</span>

				</a>

			</li>

			<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>

			<li class="treeview">

				<a href="#">

					<i class="fa fa-money"></i>

					<span>Ventas</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="ventas">

							<i class="fa fa-circle-o"></i>
							<span>Administrar Ventas</span>

						</a>

					</li>

					<li>

						<a href="crear-venta">

							<i class="fa fa-circle-o"></i>
							<span>Registrar Venta</span>

						</a>

					</li>

					<li>

						<a href="reportes">

							<i class="fa fa-circle-o"></i>
							<span>Reporte de Ventas</span>

						</a>

					</li>

				</ul>

			</li>

			<li>

				<a href="divisas">

					<i class="fa fa-usd"></i>
					<span>Divisas</span>

				</a>

			</li>

			<?php if($_SESSION["perfil"] =="Administrador"){ ?>

			<li>

				<a href="auditoria">

					<i class="fa fa-key"></i>
					<span>Auditoría</span>

				</a>

			</li>
			
			<?php } ?>

		</ul>

	 </section>

</aside>
