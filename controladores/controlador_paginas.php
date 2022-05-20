<?php
session_start();
include_once(".\modelos\carrito.php");
include_once(".\modelos\inicio.php");
include_once(".\modelos\conexion.php");

class controladorPaginas{
    // metodos
    public function inicio(){
        //si ese usuario de sesión tiene un valor, imprime esa información
        if($_SESSION['correo_cliente']=='ok'){
            $nombreUsuario=$_SESSION['nombreUsuario'];
        }
        //Buscar todos los artículos
        $articulos=inicio::consultarArticulos();
        //Buscar todos los artículos con 20% de descuento
        $articulosDes=inicio::consultarArticulosDescuento();
        //Buscar 4 artículos con 20% de descuento
        $articulosDes2=inicio::consultarArticulosDescuento2();
        //Buscar 4 artículos con 10% de descuento
        $articulosDes3=inicio::consultarArticulosDescuento3();

        $carrito=carrito::obtener_detalles_articulos_carrito();
        
        // $productoYaEstaEnCarrito=carrito::obtener_id_articulos_carrito();
        include_once("vistas/paginas/inicio.php");
    }

    public function agregar_al_carrito(){
        //Agregar al carrito
        $id_articulos=$_REQUEST['id'];
        carrito::agregar_al_carrito($id_articulos);
    }

    public function conteo_carrito(){
        // $conteo=carrito::obtener_id_articulos_carrito2();
    }

    public function error(){
        include_once("vistas/paginas/error.php");
    }
}


?>