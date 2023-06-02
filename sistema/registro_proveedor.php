<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['proveedor']) || empty($_POST['contacto']) || empty($_POST['telefono']) || empty($_POST['direccion'])) {
        $alert = '<div class="alert alert-danger" role="alert">
                        Todo los campos son obligatorios
                    </div>';
    } else {
        $proveedor = $_POST['proveedor'];
        $contacto = $_POST['contacto'];
        $telefono = $_POST['telefono'];
        $Direccion = $_POST['direccion'];
        $usuario_id = $_SESSION['idUser'];
        $query = mysqli_query($conexion, "SELECT * FROM proveedor where contacto = '$contacto'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El Ruc ya esta registrado
                    </div>';
        }else{
        

        $query_insert = mysqli_query($conexion, "INSERT INTO proveedor(proveedor,contacto,telefono,direccion,usuario_id) values ('$proveedor', '$contacto', '$telefono', '$Direccion','$usuario_id')");
        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Proveedor Registrado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                       Error al registrar proveedor
                    </div>';
        }
        }
    }
}
mysqli_close($conexion);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 style="color: #000000"; class="h3 mb-0 text-gray-800">Nuevo Proveedor</h1>
        <!--
            <a href="lista_proveedor.php" style ="background-color:#4594cc;border-color:#4594cc; color:white; width:170px" type="button" class="btn btn-primary">Regresar</a>
        -->
    </div>
    <link href="CSS/botones.css" rel="stylesheet">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
            <div class="card-body">
                <form action="" autocomplete="off" method="post" class="card-body p-2">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="nombre">NOMBRE</label>
                        <input type="text" placeholder="Ingrese nombre" name="proveedor" id="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contacto">RUC</label>
                        <input type="number" placeholder="Ingrese nombre del contacto" name="contacto" id="contacto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telefono">TELÉFONO</label>
                        <input type="number" placeholder="Ingrese teléfono" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccion">DIRECCIÓN</label>
                        <input type="text" placeholder="Ingrese Direccion" name="direccion" id="direcion" class="form-control">
                    </div>
                    <div class="boton">
                        <button type="submit" class="guardar">Guardar</button>
                        <a href="lista_proveedor.php" type="button" class="cancelar">Cancelar</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?php include_once "includes/footer.php"; ?>