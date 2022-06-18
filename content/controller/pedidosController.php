<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;
use content\component\footerElement as footerElement;

use content\models\homeModel as inicio;
use content\models\carritoModel as carrito;
use content\models\pedidosModel as pedidos;
use content\models\clientesModel as clientes;

$head = new headElement();
$bottom = new bottomComponent();
$footer = new footerElement();

//si ese usuario de sesión tiene un valor, imprime esa información
clientes::validarLogin();
// Formas de pago
$formaDePago=pedidos::consultarFormaDePago();
// Consultar clientes por correo 
$consultar=clientes::consultarClientesPorCorreo();
// codigos de telefono
$codigoTelefono=clientes::consultarCodigoTelefono();

// Cantidad de articulos en el carrito 
$conteo = count(carrito::obtener_id_articulos_carrito());  
// Obtener detalles del carrito de compras
$carrito=carrito::obtener_detalles_articulos_carrito();
include_once("view/pedidos/pedidosView.php");
?>