<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;

use DateTime as DateTime;
use content\models\adminModel as admin;
use content\models\articulosModel as articulos;
use content\models\categoriasModel as categorias;
use content\models\proveedoresModel as proveedores;

$head = new headElement();
$bottom = new bottomComponent();

admin::validarLogin();

//Buscar categorias
$categoria=categorias::consultarCategoria();
//Buscar proveedores
$proveedores=proveedores::consultarProveedores();

// Recepcionamos los datos por medio de post
if($_POST){
    $id_articulos=$_POST['id_articulos'];
    $codigo_articulo=$_POST['codigo_articulo'];
    $nombre_articulo=$_POST['nombre_articulo'];
    $descripcion=$_POST['descripcion'];
    $costo=$_POST['costo'];
    $precio_venta=$_POST['precio_venta'];
    $cantidad=$_POST['cantidad'];
    $estado=$_POST['estado'];
    $id_categoria=$_POST['categoria'];
    $descuento=$_POST['descuento'];
    $id_proveedores=$_POST['proveedores'];
    $imagen=$_FILES["imagen"];

    $fecha= new DateTime();
    // Condicion ternaria:
    $nombreArchivo=($imagen!="")?$fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"imagen.jpg";
    // Imagen temporal
    $tmpimagen=$_FILES["imagen"]["tmp_name"];

    if($tmpimagen!=""){
        // Si no está vacía mover imagen a carpeta img
        move_uploaded_file($tmpimagen,"../asset/img/".$nombreArchivo);
    }
    // ejecutamos 
    articulos::crear($id_categoria,$codigo_articulo, $nombre_articulo, $descripcion, $costo, $precio_venta, $cantidad, $id_proveedores, $estado, $descuento, $nombreArchivo);       
    $mensaje1="Artículo agregado exitosamente";
}

if($_SESSION['correo']=='ok'){
    $nombreAdmin=$_SESSION['nombreAdmin'];
    $date=$_SESSION['date'];
}

include_once("view/articulos/crearArticulosView.php");

?>