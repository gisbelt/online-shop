<?php 
session_start();
// Conexion BD 
include_once("./modelos/validarLogin.php");
include_once(".\modelos\login.php");
include_once(".\modelos\conexion.php");

class controladorCarrito {

    public function agregar(){
        include_once "funciones.php";
        if (!isset($_POST["id_producto"])) {
            exit("No hay id_producto");
        }
        agregarProductoAlCarrito($_POST["id_producto"]);
        header("Location: tienda.php");
        include_once("vistas/tienda/inicio.php");
    }
      
    
}
?>