<?php 
session_start();
// Conexion BD 
include_once("./modelos/validarLogin.php");
include_once(".\modelos\login.php");
include_once(".\modelos\conexion.php");

class controladorAdmin {

    public function inicio(){
        if(!isset($_SESSION['correo'])){
            header("Location:?controlador=login&accion=login");     
        }else{
            // sino, si ese usuario tiene un valor, imprime esa información
            if($_SESSION['correo']=='ok'){
                $nombreAdmin=$_SESSION['nombreAdmin'];
                $date=$_SESSION['ip'];
            }
        }
        include_once("vistas/administrador/inicio.php");
    }
      
    
}
?>