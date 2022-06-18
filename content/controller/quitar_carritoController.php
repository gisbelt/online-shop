<?php
namespace content\controller;

use content\models\carritoModel as carrito;

// Recibimos el id del articulo 
$id_articulos=$_REQUEST['id'];
carrito::quitar_articulos_carrito($id_articulos);

// Cantidad de articulos en el carrito 
$conteo=count(carrito::obtener_id_articulos_carrito()); 
echo json_decode($conteo);

?>

