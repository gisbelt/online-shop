<?php
namespace content\controller;

use content\models\carritoModel as carrito;

// Agregar al carrito
$id_articulos=$_REQUEST['id'];
carrito::agregar_al_carrito($id_articulos);

// Cantidad de articulos en el carrito 
$conteo=count(carrito::obtener_id_articulos_carrito()); 
echo json_decode($conteo);
?>