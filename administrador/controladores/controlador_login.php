<?php 
session_start();
// Conexion BD 
include_once("./modelos/login.php");
include_once("./modelos/conexion.php");


class controladorLogin {

    public function inicio(){
        include_once("vistas/administrador/inicio.php");
    }

    public function login(){
        // Si hay un envio tipo post redirecciona a algún lugar
        if(isset($_POST['login'])){
            $correo = $_POST['correo'];
            $contrasenia = $_POST['contrasenia'];
            // rea una variable de sesion con el valor de ok y otra con el nombre del usuario 
            // ambas variables se validarán para poder entrar en el admin 
            if($correo=="" || $contrasenia==""){
                $mensaje1="Por favor debe ingresar los datos";
            }
            else{
                $conexionBD=BD::crearInstancia();
                $sql= $conexionBD->prepare("SELECT correo,contrasenia,nombre FROM administrador WHERE correo=?"); 
                $sql->execute(array($correo));
                $consultarAdmin=$sql->fetch(PDO::FETCH_LAZY);
                if($consultarAdmin->contrasenia==$contrasenia && $consultarAdmin->correo==$correo){
                    $_SESSION['correo']='ok';
                    $_SESSION['correoAdmin']=$consultarAdmin->correo;
                    $_SESSION['nombreAdmin']=$consultarAdmin->nombre;
                    header("location:?controlador=admin&accion=inicio");  
                }else{
                    $mensaje2="Error, el correo o contraseña son incorrectos";
                }    
              
            }  
              
        }

        include_once("vistas/administrador/login.php");    
        include_once("vistas/template.php");       
         
    }
    
}
?>