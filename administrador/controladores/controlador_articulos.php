<?php 
session_start();
// Conexion BD 
include_once("./modelos/validarLogin.php");
include_once(".\modelos\artículos.php");
include_once(".\modelos\categoria.php");
include_once(".\modelos\conexion.php");


class controladorArticulos {

    public function inicio(){
        //$categoria=categorias::consultarCategoria();
        include_once("vistas/administrador/inicio.php");
    }

    public function crearArticulos(){
        //Buscar categorias
        $categoria=categorias::consultarCategoria();
        
        // Recepcionamos los datos por medio de post
        if($_POST){
            $id_articulos=$_POST['id_articulos'];
            $codigo_articulo=$_POST['codigo_articulo'];
            $nombre_articulo=$_POST['nombre_articulo'];
            $descripcion=$_POST['descripcion'];
            $precio_venta=$_POST['precio_venta'];
            $cantidad=$_POST['cantidad'];
            $estado=$_POST['estado'];
            $id_categoria=$_POST['categoria'];
            $descuento=$_POST['descuento'];
            $imagen=$_FILES["imagen"];

            $fecha= new DateTime();
            // Condicion ternaria:
            $nombreArchivo=($imagen!="")?$fecha->getTimestamp()."_".$_FILES["imagen"]["name"]:"imagen.jpg";
            // Imagen temporal
            $tmpimagen=$_FILES["imagen"]["tmp_name"];

            if($tmpimagen!=""){
                // Si no está vacía mover imagen a carpeta img
                move_uploaded_file($tmpimagen,"./img/".$nombreArchivo);
            }
            // ejecutamos 
            articulos::crear($id_categoria,$codigo_articulo, $nombre_articulo, $descripcion, $precio_venta, $cantidad, $estado, $descuento, $nombreArchivo);       
            $mensaje1="Artículo agregado exitosamente";
            // header("location:./?controlador=articulos&accion=crearArticulos");
            
        }
        include_once("vistas/articulos/crearArticulos.php");
    }

    public function consultarArticulos(){
        validarLogin::validar();
        //Buscar categorias
        $categoria=categorias::consultarCategoria();
        //Buscar todos los artículos
        $articulos=articulos::consultarArticulos();

        include_once("vistas/articulos/consultarArticulos.php");
    }

    public function editarArticulos(){           
        // Editar artículos  
        if($_POST){
            $id_articulos=$_GET['id_articulos'];
            $codigo_articulo=$_POST['ecodigo_articulo'];
            $nombre_articulo=$_POST['enombre_articulo'];
            $descripcion=$_POST['edescripcion'];
            $precio_venta=$_POST['eprecio_venta'];
            $cantidad=$_POST['ecantidad'];
            $estado=$_POST['iestado'];
            $id_categoria=$_POST['icategoria'];
            $descuento=$_POST['idescuento'];
            $imagen=(isset($_FILES['eimagen']['name']))?$_FILES['eimagen']['name']:"";
            articulos::editar($nombre_articulo, $descripcion, $precio_venta, $cantidad, $estado, $id_categoria, $descuento, $id_articulos);

            // Para imagen
            if($imagen!=""){
                // Insertar en la carpeta la nueva imagen
                $fecha= new DateTime();
                // Condicion ternaria:
                $nombreArchivo=($imagen!="")?$fecha->getTimestamp()."_".$_FILES["eimagen"]["name"]:"imagen.jpg";
                $tmpimagen=$_FILES["eimagen"]["tmp_name"];
                move_uploaded_file($tmpimagen,"./img/".$nombreArchivo);
                
                // Una vez insertada la nueva imagen, borramos la anterior
                // $id_articulos=$_POST['eid_articulos'];
                $conexionBD=BD::crearInstancia();
                $sql= $conexionBD->prepare("SELECT imagen FROM articulos WHERE id_articulos=?");
                $sql->execute(array($id_articulos));
                $borrarimagenn=$sql->fetch(PDO::FETCH_LAZY);

                if(isset($borrarimagenn->imagen) && ($borrarimagenn->imagen!="imagen.jpg")){
                    if(file_exists("./img/".$borrarimagenn->imagen)){
                        unlink("./img/".$borrarimagenn->imagen);
                    }
                }
                // Luego de que borremos, actualizamos con el nuevo nombre de la imagen
                $sentenciaSQL= $conexionBD->prepare("UPDATE articulos SET imagen=? WHERE id_articulos=?");
                $sentenciaSQL->execute(array($nombreArchivo,$id_articulos)); 
            }
            // header("Location:./?controlador=articulos&accion=editarArticulos");
            $mensaje1="Artículo editado exitosamente";
        }
       
        //Buscar categorias
        $categoria=categorias::consultarCategoria();

        //Buscar Artículos para por id
        $id_articulos=$_GET['id_articulos'];
        $buscar=articulos::buscar($id_articulos);
                             
        include_once("vistas/articulos/editarArticulos.php");
    }

    public function borrar(){

        // Buscarmos la imagen en BD y la borramos de la carpeta
        $id_articulos=$_GET['id_articulos'];
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT imagen FROM articulos WHERE id_articulos=?");
        $sql->execute(array($id_articulos));
        $borrarimagenn=$sql->fetch(PDO::FETCH_LAZY);

        if(isset($borrarimagenn->imagen) && ($borrarimagenn->imagen!="imagen.jpg")){
            if(file_exists("./img/".$borrarimagenn->imagen)){
                unlink("./img/".$borrarimagenn->imagen);
            }
        }           

        //Borrar Articulos Revisar
        $id_articulos=$_GET['id_articulos'];
        articulos::borrar($id_articulos);      
        header("location:./?controlador=articulos&accion=consultarArticulos");
        include_once("vistas/articulos/consultarArticulos.php");
    }
      
    
}
?>