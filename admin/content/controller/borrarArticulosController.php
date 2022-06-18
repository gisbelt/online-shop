<?php 
namespace content\controller;

use content\models\adminModel as admin;
use content\models\articulosModel as articulos;

admin::validarLogin();

// Recibimos el id del articulo 
$id_articulos=$_REQUEST['id'];
// Borramos la imagen de la carpeta
$borrarimagenn=articulos::borrarimagen($id_articulos);
if(isset($borrarimagenn->imagen) && ($borrarimagenn->imagen!="imagen.jpg")){
    if(file_exists("../asset/img/".$borrarimagenn->imagen)){
        unlink("../asset/img/".$borrarimagenn->imagen);
    }
}
// Borrarmos en la BD 
articulos::eliminarArticulosPorID($id_articulos);

?>