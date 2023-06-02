﻿<?php include_once "includes/header.php"; ?>


<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 style="color: #000000"; class="h3 mb-0 text-gray-800">Maestro de Usuarios</h1>
		<?php if ($_SESSION['rol'] == 1) { ?>
		<a href="registro_usuario.php" style ="background-color:#3CB032;border-color:#3CB032; color:white; width:170px" type="button" class="btn btn-primary">Nuevo</a>
		<?php } ?>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table align="center" style="width:1000px;color: #000000" class="table table-bordered table-hover"id="table">
				<!-- <table align="center" style="width:1000px;color: #f4f5f4" class="table table-striped table-dark" id="table"> -->
					<thead align="center" style="background-color: #000000;color: white">
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>CORREO</th>
							<th>USUARIO</th>
							<th>DIRECCIÓN</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
							<th>ACCIONES</th>
							<?php }?>
						</tr>
					</thead>
					<tbody align="center">
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE u.estado = 'A'");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['idusuario']; ?></td>
									<td><?php echo $data['nombre']; ?></td>
									<td><?php echo $data['correo']; ?></td>
									<td><?php echo $data['usuario']; ?></td>
									<td><?php echo $data['rol']; ?></td>
									<?php if ($_SESSION['rol'] == 1) { ?>
									<td>
										<a href="editar_usuario.php?id=<?php echo $data['idusuario']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
										<form action="inhabilitar_usuario.php?id=<?php echo $data['idusuario']; ?>" method="post" class="confirmar d-inline">
											<button class="btn btn-danger" type="submit">Inhabilitar</button>
										</form>
									</td>
									<?php } ?>
								</tr>
						<?php }
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>


</div>
<!-- /.container-fluid -->


<?php include_once "includes/footer.php"; ?>