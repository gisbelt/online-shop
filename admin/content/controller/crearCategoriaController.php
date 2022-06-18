<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;

use content\models\adminModel as admin;
use content\models\categoriasModel as categorias;

$head = new headElement();
$bottom = new bottomComponent();

admin::validarLogin();

$accion = (isset($_POST['accion']))?$_POST['accion']:"";
switch ($accion) {
    case 'Agregar':
        // Recepcionamos los datos por medio de post
        if($_POST){
            $id_categoria=$_POST['id_categoria'];
            $categoria=$_POST['categoria'];
            $descripcion=$_POST['descripcion'];
            // ejecutamos 
            categorias::crear($id_categoria, $categoria,$descripcion);       
            $mensaje1="Categoría agregada exitosamente";
        }
        break; 

    case 'Editar':
        $id_categoria2=$_POST['id_categoria'];
        $categoria2=$_POST['categoria'];
        $descripcion2=$_POST['descripcion'];
        categorias::editarCategoria($categoria2,$descripcion2,$id_categoria2);
        $mensaje1="Categoría modificada exitosamente";
        break; 

    case 'seleccionar':
        $id_categoria3=$_POST['id_categoria'];
        $categoriaPorID=categorias::consultarCategoriaPorID($id_categoria3);
        break; 

    default:
        # code...
        break;
}

// Buscar todas las categorias
$categoria=categorias::consultarCategoria();

if($_SESSION['correo']=='ok'){
    $nombreAdmin=$_SESSION['nombreAdmin'];
    $date=$_SESSION['date'];
}

include_once("view/categorias/crearCategoriaView.php");

?>