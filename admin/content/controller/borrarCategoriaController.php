<?php 
namespace content\controller;

use content\models\adminModel as admin;
use content\models\categoriasModel as categorias;

admin::validarLogin();

// Recibimos el id de la categoria 
$id_categoria=$_REQUEST['id'];
// Borrarmos categoría  
categorias::eliminarCategoriaPorID($id_categoria);

?>