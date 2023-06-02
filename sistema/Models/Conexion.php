<?php
    namespace Models;

    class Conexion{

    
        public static function Conectar(){
            $host = "localhost";
            $user = "root";
            $clave = "";
            $bd = "sis_venta";
            $conexion = mysqli_connect($host,$user,$clave,$bd);
            if (mysqli_connect_errno()){
                echo "No se pudo conectar a la base de datos";
                exit();
            }else{
                return $conexion;
            }
            //mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
            //mysqli_set_charset($conexion,"utf8");
        }
    }







?>
