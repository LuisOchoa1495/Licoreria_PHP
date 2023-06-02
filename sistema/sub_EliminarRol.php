<?php
    if (!empty($_GET['id'])) {
        require("../conexion.php");
        $alert2 = "";
        $id = $_GET['id'];
        $result = 0;
        $query = mysqli_query($conexion, "SELECT * FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE r.idrol = '$id'");
        $result = mysqli_fetch_array($query);
        if ($result > 0) {
            header("location: sup_CrearRol.php");
            $alert2 = '
            <div class="alert alert-danger" role="alert">
                No se puede eliminar. Existen usuarios con este rol.
            </div>';
            
        } else {
            $query_delete = mysqli_query($conexion, "DELETE FROM rol WHERE idrol = $id");
            if ($query_insert) {
                header("location: sup_CrearRol.php");
                $alert2 = '
                <div class="alert alert-primary" role="alert">
                    Rol eliminado correctamente
                </div>';
            } else {
                header("location: sup_CrearRol.php");
                $alert2 = '
                <div class="alert alert-danger" role="alert">
                    Error al eliminar
                </div>';
            }
            mysqli_close($conexion);
        }
    }
?>
