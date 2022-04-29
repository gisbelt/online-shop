<?php
include_once("modelos/carrito.php");
include_once("./administrador/modelos/categoria.php");
include_once("modelos/tienda.php");
// include_once("C:\wamp\www\CasaCarlina\administrador\modelos\artículos.php");
include_once("modelos/conexion.php");
session_start();

class controladorTienda{
    // metodos
    public function tienda(){

        //Buscar categorias
        $categoria=categorias::consultarCategoria();
        //Buscar todos los artículos (7)
        $articulos=tienda::consultarArticulos();
        $pages=tienda::paginacion();

        // Agregar al carrito
        if($_POST) {
            $id_articulos = $_POST["id_articulos"];
            carrito::agregar_al_carrito($id_articulos);
            header("location:?controlador=tienda&accion=tienda");
            // error aqui 
        } 
        include_once("vistas/tienda/tienda.php");
    }

    public function paginacion(){
        tienda::paginacion2();
    }

    public function ver_mas(){
        //Buscar artículos por ID
        $id_articulos = $_GET["id_articulos"];
        $articulosPorID=tienda::consultarArticulosPorID($id_articulos);
        include_once("vistas/tienda/ver_mas.php");
    }

    public function login(){
        include_once("vistas/clientes/login.php");
    }


    public function crear(){
       include_once("vistas/clientes/crear.php");
    }

    public function editar(){
        
        include_once("vistas/empleados/editar.php");
  
    }
}

?>