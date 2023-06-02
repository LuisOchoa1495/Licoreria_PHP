<?php

use Controllers\controllerCliente;

spl_autoload_register(function($clase){
    require_once str_replace('\\', '/', $clase).'.php';
});

if (isset($_POST['operacion'])) {

    if (($_POST['operacion'])=="insertar") {
        
        $ctrlCliente = new controllerCliente;
        $ctrlCliente->insertar();

    }
	
}else{
    $ctrlCliente = new controllerCliente;
    $ctrlCliente->cliente();
}

?>