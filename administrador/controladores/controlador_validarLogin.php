<!-- Bloquemos la cabecera del admin para que no todo el mundo pueda entrar -->
<?php
class controladorValidarLogin{

  public function inicio(){
    // Si la sesion esta vacía o no hay usuario logueado, redirecciona al index
    if(!isset($_SESSION['correo'])){
      // header("Location:?controlador=login&accion=login");
     
    }else{
      // sino, si ese usuario tiene un valor, imprime esa información
      if($_SESSION['correo']=='ok'){
        $nombreUsuario=$_SESSION['nombreUsuario'];
        header("Location:?controlador=login&accion=inicio");
        echo $nombreUsuario;
        // include_once("vistas/administrador/inicio.php");
      }
    }

  }
}
?>