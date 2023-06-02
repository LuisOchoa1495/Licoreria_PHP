<?php
namespace Models;

class Cliente{

    public $dni;
    public $nombre;
    public $telefono;
    public $direccion;
    public $usuario_id;

    public function insertar(){

        $dni = $this->dni;
        $nombre = $this->nombre;
        $telefono = $this->telefono;
        $direccion = $this->direccion;
        $usuario_id = $this->usuario_id;

        $conexion = Conexion::Conectar();
        $query_insert = mysqli_query($conexion, "INSERT INTO cliente(dni,nombre,telefono,direccion, usuario_id) values ('$dni', '$nombre', '$telefono', '$direccion', '$usuario_id')");
        mysqli_close($conexion);
    }

    public static function buscar($dni){

        $conexion = Conexion::Conectar();
        $query = mysqli_query($conexion, "SELECT * FROM cliente where dni = '$dni'");
        $result = mysqli_fetch_array($query);

        if($result>0){
            return 1;
        }else{
            return 0;
        }
        mysqli_close($conexion);
    }

}



?>