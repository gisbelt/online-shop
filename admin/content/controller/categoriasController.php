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
// Buscar todas las categorias
$categoria=categorias::consultarCategoria();
//Buscar por categoria
$categoria2=$_GET['nombre_categoria'];
$buscar=categorias::buscar($categoria2);

if($_SESSION['correo']=='ok'){
    $nombreAdmin=$_SESSION['nombreAdmin'];
    $date=$_SESSION['date'];
}

include_once("view/categorias/categoriasView.php");

?>