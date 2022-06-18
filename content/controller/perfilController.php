<?php 
namespace content\controller;

header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;
use content\component\footerElement as footerElement;

use content\models\clientesModel as clientes;
use content\models\carritoModel as carrito;

$head = new headElement();
$bottom = new bottomComponent();
$footer = new footerElement();

// Consultar clientes por correo 
$consultar=clientes::consultarClientesPorCorreo();
// codigos de telefono
$codigoTelefono=clientes::consultarCodigoTelefono();

// Cantidad de articulos en el carrito 
$conteo = count(carrito::obtener_id_articulos_carrito()); 
if(isset($_SESSION['correoCliente'])){
    include_once("view/clientes/perfilView.php");
}
else{
    header("Location:?url=home");
}
?>