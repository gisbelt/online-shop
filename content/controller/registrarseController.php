<?php 
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;

$head = new headElement();
$bottom = new bottomComponent();

if(isset($_SESSION['correoCliente'])){
    header("Location:?url=home");
}
else{
    include_once("view/clientes/registrarseView.php");
}
?>