<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;
use content\component\footerElement as footerElement;

use content\models\homeModel as inicio;
use content\models\carritoModel as carrito;
use content\models\clientesModel as clientes;

$head = new headElement();
$bottom = new bottomComponent();
$footer = new footerElement();

//si ese usuario de sesión tiene un valor, imprime esa información
if($_SESSION['correo_cliente']=='ok'){
    $nombreCliente=$_SESSION['nombreCliente'];
}
//Buscar todos los artículos
$articulos=inicio::consultarArticulos();
//Consultar todos los articulos con orden descendente
$articulosOrdenDesc=inicio::consultarArticulosOrdenDesc();
//Buscar todos los artículos con 20% de descuento
$articulosDes=inicio::consultarArticulosDescuento();
//Buscar 4 artículos con 20% de descuento
$articulosDes2=inicio::consultarArticulosDescuento2();
//Buscar 4 artículos con 10% de descuento
$articulosDes3=inicio::consultarArticulosDescuento3();
//Buscar 4 artículos con sin descuento
$articulosDes4=inicio::consultarArticulosDescuento4();

$carrito=carrito::obtener_detalles_articulos_carrito();

// Cantidad de articulos en el carrito 
$conteo = count(carrito::obtener_id_articulos_carrito()); 
require_once("view/homeView.php");
?>