<?php
if (!empty($_GET['id'])) {
    require("../conexion.php");
    $id = $_GET['id'];
    $query_delete = mysqli_query($conexion, "UPDATE usuario SET ESTADO = 'I' WHERE idusuario = $id");
    mysqli_close($conexion);
    header("location: lista_usuarios.php");
}
?>