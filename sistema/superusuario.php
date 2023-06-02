<?php include_once "includes/header.php"; 
?>

<div class="container-fluid">
    <link href="CSS/botones.css" rel="stylesheet">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Superusuario</h1>
	</div>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
            <div class="card-body">
                <form action="" autocomplete="off" method="post" class="card-body p-2">
                    <div class="form-group" align="center">
                        <a href="sup_CrearRol.php" name="CrearPerfil" value="0" bgcolor="black" type="button" class="nuevo"><i class="fas fa-user"></i>&nbsp;&nbsp;Crear Rol</a>
                    </div>
                    <div class="form-group" align="center">
                        <a href="index.php" name="HabUsuario" value="0" href="superusuario.php.php" type="button" class="cancelar"><i class="fas fa-user"></i>&nbsp;&nbsp;Habilitar Usuario</a>
                    </div>
                    <div class="form-group" align="center">
                        <a href="index.php" type="button" class="editar"><i class="fas fa-user"></i>&nbsp;&nbsp;Habilitar Producto</a>
                    </div>
                    <div class="form-group" align="center">
                        <a href="index.php" type="button" class="guardar"><i class="fas fa-user"></i>&nbsp;&nbsp;Habilitar Proveedor</a>
                    </div>
                    <div class="form-group" align="center">
                        <a href="index.php" type="button" class="nuevo"><i class="fas fa-user"></i>&nbsp;&nbsp;Habilitar Cliente</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


</div>

<?php include_once "includes/footer.php"; ?>