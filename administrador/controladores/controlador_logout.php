<?php 
class controladorLogout {

    public function cerrar(){
        //error aquí continuar con carrito
        session_start(); 
        session_destroy();
        header("location:?controlador=login&accion=login");
    }
    
}
?>