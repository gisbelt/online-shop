<?php 
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;

use content\models\adminModel as admin;
use content\models\articulosModel as articulos;
use content\models\categoriasModel as categorias;

$head = new headElement();
$bottom = new bottomComponent();

admin::validarLogin();
//Buscar categorias
$categoria=categorias::consultarCategoria();
//Buscar todos los artículos
$articulos=articulos::consultarArticulos();

if($_SESSION['correo']=='ok'){
    $nombreAdmin=$_SESSION['nombreAdmin'];
    $date=$_SESSION['date'];
}

include_once("view/articulos/consultarArticulosView.php");

?>