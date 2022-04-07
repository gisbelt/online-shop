<?php 
session_start();
// Conexion BD 
include_once("modelos/carrito.php");
include_once("modelos/conexion.php");

class controladorCarrito {

    public function vercarrito(){
        // Ver detalles del carrito de compras
        $carrito=carrito::obtener_detalles_articulos_carrito();
        include_once("vistas/carrito/vercarrito.php");
    }

    public function quitarcarrito(){
        // Recibimos el id del articulo 
        $id_articulos=$_REQUEST['id'];
        carrito::quitar_articulos_carrito($id_articulos);
    }

    public function conteo_carrito(){
        // $conteo = count(carrito::obtener_id_articulos_carrito());
        include_once("vistas/template.php");
    }
      
    
}
?>