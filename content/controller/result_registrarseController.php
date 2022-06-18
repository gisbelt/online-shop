<?php 
namespace content\controller;

use content\models\clientesModel as clientes;

header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");

if($_POST){
    $nombre_cliente=$_POST['nombre_cliente'];
    $apellido_cliente=$_POST['apellido_cliente'];
    $correo_cliente=$_POST['correo_cliente'];
    $contrasenia=$_POST['contrasenia'];
    clientes::crear($nombre_cliente,$apellido_cliente,$correo_cliente,$contrasenia);       
}else{
    header("location:./?url=login");
}

?>