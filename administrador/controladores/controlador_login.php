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
            if($correo=="" || $contrasenia==""){
                $mensaje1="Por favor debe ingresar los datos";
            }
            else{
                //ejecutamos
                $consultarAdmin=Login::acceso($correo); 
                if($consultarAdmin['contrasenia']==$contrasenia && $consultarAdmin['correo']==$correo){
                    $_SESSION['correo']='ok';
                    $_SESSION['correoAdmin']=$consultarAdmin->correo;
                    $_SESSION['nombreAdmin']=$consultarAdmin->nombre;
                    $_SESSION['date']=date('d_m_Y_H_i');
                    $_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
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