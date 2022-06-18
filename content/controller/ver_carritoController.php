<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;
use content\component\footerElement as footerElement;
use content\models\carritoModel as carrito;
$head = new headElement();
$bottom = new bottomComponent();
$footer = new footerElement();

// Cantidad de articulos en el carrito 
$conteo = count(carrito::obtener_id_articulos_carrito());   
// Obtener detalles del carrito de compras
$carrito=carrito::obtener_detalles_articulos_carrito();
include_once("view/carrito/vercarritoView.php");

?>
