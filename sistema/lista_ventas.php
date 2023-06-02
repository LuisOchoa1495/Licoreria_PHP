<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 style="color: #000000"; class="h3 mb-0 text-gray-800">Ventas</h1>
		<a href="registro_venta.php" style ="background-color:#3CB032;border-color:#3CB032; color:white; width:170px" type="button" class="btn btn-primary">Nuevo</a>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
			<table align="center" style="width:1000px;color: #000000" class="table table-bordered table-hover"id="table">
				<!-- <table align="center" style="width:1000px;color: #f4f5f4" class="table table-striped table-dark" id="table"> -->
					<thead align="center" style="background-color: #000000;color: white">
						<tr>
							<th>ID</th>
							<th>FECHA</th>
							<th>TOTAL</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody align="center">
						<?php
						require "../conexion.php";
						$query = mysqli_query($conexion, "SELECT nofactura, fecha,codcliente, totalfactura, estado FROM factura ORDER BY nofactura DESC");
						mysqli_close($conexion);
						$cli = mysqli_num_rows($query);

						if ($cli > 0) {
							while ($dato = mysqli_fetch_array($query)) {
						?>
								<tr>
									<td><?php echo $dato['nofactura']; ?></td>
									<td><?php echo $dato['fecha']; ?></td>
									<td><?php echo $dato['totalfactura']; ?></td>
									<td>
									<button type="button" class="btn btn-primary view_factura" cl="<?php echo $dato['codcliente'];  ?>" f="<?php echo $dato['nofactura']; ?>"><i class='fas fa-file-pdf'></i></button>
									</td>
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