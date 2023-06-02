<?php include_once "includes/header.php"; ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 style="color: #000000"; class="h3 mb-0 text-gray-800">Información Personal</h1>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nombre: <strong><?php echo $_SESSION['nombre']; ?></strong></label>
                    </div>
                    <div class="form-group">
                        <label>Correo: <strong><?php echo $_SESSION['email']; ?></strong></label>
                    </div>
                    <div class="form-group">
                        <label>Rol: <strong><?php echo $_SESSION['rol_name']; ?></strong></label>
                    </div>
                    <div class="form-group">
                        <label>Usuario: <strong><?php echo $_SESSION['user']; ?></strong></label>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item active">Cambiar Contraseña</li>
                        <form action="" method=" post" name="frmChangePass" id="frmChangePass" class="p-3">
                            <div class="form-group">
                                <label>Contraseña Actual</label>
                                <input type="password" name="actual" id="actual" placeholder="Clave Actual" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nueva Contraseña</label>
                                <input type="password" name="nueva" id="nueva" placeholder="Nueva Clave" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirmar Contraseña</label>
                                <input type="password" name="confirmar" id="confirmar" placeholder="Confirmar clave" required class="form-control">
                            </div>
                            <div class="alertChangePass" style="display:none;">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btnChangePass">Cambiar Contraseña</button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>