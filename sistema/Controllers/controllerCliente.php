<?php
namespace Controllers;

use Models\Cliente;
use view\Cliente\viewRegistrarCliente;

class controllerCliente{

    function cliente(){
        $objView = new viewRegistrarCliente;
        $datos = array("mensaje"=>"");
        $objView->showPage($datos);
    }


    function insertar(){

        $data = array();
        $data["mensaje"]="";
        if (empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['dni'])) {
            $data["mensaje"]= '<div class="alert alert-danger" role="alert">Todo los campos son obligatorios</div>';
        } 
        else{
            if(Cliente::buscar($_POST['dni'])){
                $data["mensaje"] = '<div class="alert alert-danger" role="alert">El dni ya existe</div>';
            }else{
                $cliente = new Cliente;
                $cliente->dni = $_POST['dni'];
                $cliente->nombre = $_POST['nombre'];
                $cliente->telefono = $_POST['telefono'];
                $cliente->direccion = $_POST['direccion'];
                $cliente->usuario_id = $_POST['idUser'];
                $cliente->insertar();

                $data["mensaje"] = '<div class="alert alert-primary" role="alert">Cliente Registrado</div>';

            }
        }
        $objView = new viewRegistrarCliente;
        $objView->showPage($data);
    }
}

?>