<?php 
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");

include_once("modelos/clientes.php");
include_once("modelos/carrito.php");
include_once("modelos/conexion.php");

if($_POST){
    $nombre_cliente=$_POST['nombre_cliente'];
    $apellido_cliente=$_POST['apellido_cliente'];
    $correo_cliente=$_POST['correo_cliente'];
    $contrasenia=$_POST['contrasenia'];
    clientes::crear($nombre_cliente,$apellido_cliente,$correo_cliente,$contrasenia);       
}else{
    header("location:./?controlador=clientes&accion=login");
}

// if($_POST['agregar_carrito1']){
    // aqui 
    $conteo = carrito::obtener_id_articulos_carrito2();
// }


?>