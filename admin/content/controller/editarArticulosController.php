<?php 
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;

use DateTime as DateTime;
use content\config\conection\database as BD;
use content\models\adminModel as admin;
use content\models\articulosModel as articulos;
use content\models\categoriasModel as categorias;
use content\models\proveedoresModel as proveedores;

$head = new headElement();
$bottom = new bottomComponent();

admin::validarLogin();
                 
if(isset($_POST['editar'])){
    $id_articulos=$_GET['id_articulos'];
    $codigo_articulo=$_POST['ecodigo_articulo'];
    $nombre_articulo=$_POST['enombre_articulo'];
    $descripcion=$_POST['edescripcion'];
    $costo=$_POST['ecosto'];
    $precio_venta=$_POST['eprecio_venta'];
    $cantidad=$_POST['ecantidad'];
    $id_proveedores=$_POST['iproveedor'];
    $estado=$_POST['iestado'];
    $id_categoria=$_POST['icategoria'];
    $descuento=$_POST['idescuento'];
    articulos::editarArticulos($nombre_articulo, $descripcion, $costo, $precio_venta, $cantidad, $id_proveedores, $estado, $id_categoria, $descuento, $id_articulos);
    
    // Para imagen
    $imagen=(isset($_FILES['eimagen']['name']))?$_FILES['eimagen']['name']:"";
    if($imagen!=""){
        // Insertar en la carpeta la nueva imagen
        $fecha= new DateTime();
        // Condicion ternaria:
        $nombreArchivo=($imagen!="")?$fecha->getTimestamp()."_".$_FILES["eimagen"]["name"]:"imagen.jpg";
        $tmpimagen=$_FILES["eimagen"]["tmp_name"];
        move_uploaded_file($tmpimagen,"../asset/img/".$nombreArchivo);
        
        // Una vez insertada la nueva imagen, borramos la anterior
        $borrarimagenn=articulos::borrarimagen($id_articulos);
        if(isset($borrarimagenn->imagen) && ($borrarimagenn->imagen!="imagen.jpg")){
            if(file_exists("../asset/img/".$borrarimagenn->imagen)){
                unlink("../asset/img/".$borrarimagenn->imagen);
            }
        }
        // Luego de que borremos, actualizamos con el nuevo nombre de la imagen
        $conexionBD=BD::crearInstancia();
        $sentenciaSQL= $conexionBD->prepare("UPDATE articulos SET imagen=? WHERE id_articulos=?");
        $sentenciaSQL->execute(array($nombreArchivo,$id_articulos)); 
    }
    $mensaje1="Artículo editado exitosamente";
    
}

//Buscar categorias
$categoria=categorias::consultarCategoria();
//Buscar proveedores
$proveedores=proveedores::consultarProveedores();

//Buscar Artículos para por id
$id_articulos=$_GET['id_articulos'];
$buscar=articulos::consultarArticulosPorID($id_articulos);
        
if($_SESSION['correo']=='ok'){
    $nombreAdmin=$_SESSION['nombreAdmin'];
    $date=$_SESSION['date'];
}

include_once("view/articulos/editarArticulosView.php");


?>