<?php include_once "includes/header.php"; ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 style="color: #000000"; class="h3 mb-0 text-gray-800">Productos Más Vendidos</h1>
	</div>


	<table border="0" align="center" width="75%" height="700" bgcolor="#EDEDED" >
		<tr>
			<td>
				<div align="center">
						<div class="au-card m-b-30">
							<div class="au-card-inner">
								<canvas id="polarChart"></canvas>
							</div>
						</div>
				</div>
			</td>
		</tr>
	</table>

	<!-- 
		<div align="center">
			<div class="col-lg-6">
				<div class="au-card m-b-30">
					<div class="au-card-inner">
						<canvas id="polarChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	-->
</div>

<?php include_once "includes/footer.php"; ?>