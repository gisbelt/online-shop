<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;
use content\component\footerElement as footerElement;

use content\models\tiendaModel as tienda;
use content\models\carritoModel as carrito;
use content\models\categoriasModel as categorias;

$head = new headElement();
$bottom = new bottomComponent();
$footer = new footerElement();

//Buscar categorias
$categoria=categorias::consultarCategoria();
//Buscar todos los artículos (7)
$articulos=tienda::consultarArticulos();
//Paginas a mostrar 
$pages=tienda::paginacion();

// Cantidad de articulos en el carrito 
$conteo = count(carrito::obtener_id_articulos_carrito()); 
include_once("view/tienda/tiendaView.php");
?>