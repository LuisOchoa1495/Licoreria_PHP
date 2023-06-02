<?php include_once "includes/header.php"; 
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['rol'])) {
        $alert = '
        <div class="alert alert-danger" role="alert">
            Debe ingresar el nombre del rol a crear
        </div>';
    } 
    else {
        $rol = $_POST['rol'];

        $result = 0;
        if (is_numeric($dni) and $dni != 0) {
            $query = mysqli_query($conexion, "SELECT * FROM rol where rol = '$rol'");
            $result = mysqli_fetch_array($query);
        }
        if ($result > 0) {
            $alert = '
            <div class="alert alert-danger" role="alert">
                El rol ya existe
            </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO rol(rol) values ('$rol')");
            if ($query_insert) {
                $alert = '
                <div class="alert alert-primary" role="alert">
                    Rol Registrado
                </div>';
            } else {
                $alert = '
                <div class="alert alert-danger" role="alert">
                    Error al Guardar
                </div>';
            }
        }
    }
    mysqli_close($conexion);
}
?>

<div class="container-fluid">
    <link href="CSS/botones.css" rel="stylesheet">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Crear Rol</h1>
	</div>

    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" autocomplete="off">
                        <?php echo isset($alert) ? $alert : ''; ?>
                        <div class="form-group">
                            <label for="nombre">Nombre del Rol</label>
                            <input type="text" placeholder="Ingrese Rol" name="rol" id="rol" class="form-control">
                        </div>
                        <div class="boton">
                            <button type="submit" class="guardar">Guardar</button>
                            <a href="superusuario.php" type="button" class="cancelar">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php echo isset($alert2) ? $alert2 : ''; ?>
    <table align="center" style="width:1000px;color: #000000" class="table-bordered table-hover">
		<thead align="center" style="background-color: #000000;color: white">
			<tr>
				<th>ID</th>
				<th>NOMBRE DEL ROL</th>
				<th>ACCIONES</th>
			</tr>
		</thead>
		<tbody align="center">
			<?php
			include "../conexion.php";
			$query = mysqli_query($conexion, "SELECT * FROM `rol` ORDER BY `rol`.`idrol` ASC");
			$result = mysqli_num_rows($query);
			if ($result > 0) {
				while ($data = mysqli_fetch_assoc($query)) { ?>
					<tr>
						<td><?php echo $data['idrol']; ?></td>
						<td><?php echo $data['rol']; ?></td>
						<td>
							<a href="sup_editar_rol.php?id=<?php echo $data['idrol']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
                            <form action="sub_EliminarRol.php?id=<?php echo $data['idrol']; ?>" method="post" class="confirmar d-inline">
								<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
							</form>
						</td>
					</tr>
			<?php }
			} ?>
		</tbody>
	</table>

</div>

<?php include_once "includes/footer.php"; ?>