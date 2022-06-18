<?php 
namespace content\controller;

header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");

use content\models\clientesModel as clientes;
use content\models\carritoModel as carrito;

// Editar nombre y apellido 
$nombre_cliente = $_POST['nombre_cliente_perfil'];
$apellido_cliente = $_POST['apellido_cliente_perfil'];
clientes::editarNombreApellido($nombre_cliente,$apellido_cliente);                

// Cantidad de articulos en el carrito 
$conteo = count(carrito::obtener_id_articulos_carrito());
?>
