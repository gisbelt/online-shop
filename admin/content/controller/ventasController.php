<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;

use content\models\adminModel as admin;
use content\models\facturacionModel as ventas;

$head = new headElement();
$bottom = new bottomComponent();

admin::validarLogin();

$query = $_REQUEST['id'];
$buscar=ventas::consultarArticulosActivo($query);

if($_SESSION['correo']=='ok'){
    $nombreAdmin=$_SESSION['nombreAdmin'];
    $date=$_SESSION['date'];
}

include_once("view/facturacion/ventasView.php");
?>