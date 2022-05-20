<?php
class validarLogin{

  public static function validar(){
    header("Cache-control: private");
    header("Cache-control: no-cache, must-revalidate");
    header("Pragma: no-cache");
      // Si la sesion esta vacía o no hay usuario logueado, redirecciona al login
      if(!isset($_SESSION['correo'])){
        header("Location:?controlador=login&accion=login");     
      }

  }
}
?>