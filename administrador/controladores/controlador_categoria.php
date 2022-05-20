<?php 
session_start();
// Conexion BD 
include_once("./modelos/validarLogin.php");
include_once(".\modelos\categoria.php");
include_once(".\modelos\conexion.php");

class controladorCategoria {

    public function categoria(){
        validarLogin::validar();
        
        // Buscar todas las categorias
        $categoria=categorias::consultarCategoria();

        //Buscar por categoria
        $categoria2=$_GET['nombre_categoria'];
        $buscar=categorias::buscar($categoria2);
        include_once("vistas/articulos/categoria.php");
    }
      
    
}
?>