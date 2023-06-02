<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 style="color: #000000"; class="h3 mb-0 text-gray-800">Maestro de Productos</h1>
		<a href="registro_producto.php" style ="background-color:#3CB032;border-color:#3CB032; color:white; width:170px" type="button" class="btn btn-primary">Nuevo</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
			<table align="center" style="width:1000px;color: #000000" class="table table-bordered table-hover"id="table">
				<!-- <table align="center" style="width:1000px;color: #f4f5f4" class="table table-striped table-dark" id="table"> -->
					<thead align="center" style="background-color: #000000;color: white">
						<tr>
							<th>ID</th>
							<th>PRODUCTO</th>
							<th>PRECIO</th>
							<th>STOCK</th>
							<th>ESTADO</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
							<th>ACCIONES</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody align="center">
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM producto");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['codproducto']; ?></td>
									<td><?php echo $data['descripcion']; ?></td>
									<td><?php echo $data['precio']; ?></td>
									<td><?php echo $data['existencia']; ?></td>
									<td><?php echo $data['estado']; ?></td>
										<?php if ($_SESSION['rol'] == 1) { ?>
									<td>
										<a href="stock_producto.php?id=<?php echo $data['codproducto']; ?>" class="btn btn-primary"><i class='fas fa-audio-description'></i></a>

										<a href="editar_producto.php?id=<?php echo $data['codproducto']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>

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