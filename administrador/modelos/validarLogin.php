<?php
class validarLogin{

        public static function validar(){
            // Si la sesion esta vacía o no hay usuario logueado, redirecciona al login
            if(!isset($_SESSION['correo'])){
              header("Location:?controlador=login&accion=login");     
            }
        
          }

}
?>