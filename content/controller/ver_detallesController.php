<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;
use content\component\footerElement as footerElement;

use content\models\homeModel as inicio;
use content\models\tiendaModel as tienda;
use content\models\carritoModel as carrito;

$head = new headElement();
$bottom = new bottomComponent();
$footer = new footerElement();

//Buscar artículos por ID
$id_articulos = $_GET["id_articulos"];
$articulosPorID=tienda::consultarArticulosPorID($id_articulos);
//Consultar todos los articulos con orden descendente
$articulosOrdenDesc=inicio::consultarArticulosOrdenDesc();

// Cantidad de articulos en el carrito 
$conteo = count(carrito::obtener_id_articulos_carrito()); 
include_once("view/tienda/verdetallesView.php");
?>