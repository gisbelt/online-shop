<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;

use content\models\adminModel as admin;
use content\models\articulosModel as articulos;
use content\models\proveedoresModel as proveedores;

$head = new headElement();
$bottom = new bottomComponent();

admin::validarLogin();

// Recepcionamos los datos por medio de post
if($_POST){
    $id_proveedores=$_POST['id_proveedores'];
    $nombre_proveedor=$_POST['nombre_proveedor'];
    $telefono=$_POST['telefono'];
    $correo_proveedor=$_POST['correo_proveedor'];
    $direccion=$_POST['direccion'];
    // ejecutamos 
    proveedores::crear($id_proveedores, $nombre_proveedor, $telefono, $correo_proveedor, $direccion);       
    $mensaje1="Proveedor agregado exitosamente";
    // header("location:?url=registrarProveedor");
}

if($_SESSION['correo']=='ok'){
    $nombreAdmin=$_SESSION['nombreAdmin'];
    $date=$_SESSION['date'];
}

include_once("view/proveedor/registrarProveedorView.php");

?>