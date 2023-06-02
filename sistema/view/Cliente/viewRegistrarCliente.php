<?php
namespace view\Cliente;

class viewRegistrarCliente{

    public function showPage($datos){
    include_once "includes/header.php";
    include "../conexion.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 style="color: #000000"; class="h3 mb-0 text-gray-800">Nuevo Cliente</h1>
        <!--
            <a href="lista_cliente.php" style ="background-color:#4594cc;border-color:#4594cc; color:white; width:170px" type="button" class="btn btn-primary">Regresar</a>
        -->
    </div>
    <link href="CSS/botones.css" rel="stylesheet">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <form action="indexCliente.php" method="post" autocomplete="off">
                        <input type="hidden" name="operacion" value="insertar">
                        <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">
                        <?php echo $datos['mensaje']; ?>
                        <div class="form-group">
                            <label for="dni">Dni</label>
                            <input type="number" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Ingrese dni" name="dni" id="dni" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" placeholder="Ingrese Nombre" name="nombre" id="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="number" placeholder="Ingrese Teléfono" name="telefono" id="telefono" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" placeholder="Ingrese Direccion" name="direccion" id="direccion" class="form-control">
                        </div>
                        <div class="boton">
                            <button type="submit" class="guardar">Guardar</button>
                            <a href="lista_cliente.php" type="button" class="cancelar">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

<?php
    include_once "includes/footer.php";
    }


}


?>