<?php
include_once("modelos/clientes.php");
include_once("modelos/tipo_documento.php");
include_once("modelos/codigo_telefono.php");
include_once("modelos/conexion.php");

class controladorClientes{
    // metodos
    public function inicio(){
        include_once("vistas/clientes/inicio.php");
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
                $consultarCliente=clientes::login($correo); 
                if($consultarCliente['contrasenia']==$contrasenia && $consultarCliente['correo_cliente']==$correo){
                    $_SESSION['correo_cliente'] = "ok";
                    $_SESSION['correoCliente']=$consultarCliente->correo_cliente;
                    $_SESSION['nombreCliente']=$consultarCliente->nombre_cliente;
                    $_SESSION['date']=date('d_m_Y_H_i');
                    $_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
                    header("location:?controlador=paginas&accion=inicio");  
                }else{
                    $mensaje2="Error, el correo o contraseña son incorrectos";
                }             
            }                
        }
        include_once("vistas/clientes/login.php");
    }

    public function logout(){
        session_start(); 
        session_destroy();
        header("location:?controlador=clientes&accion=login");
    }

    public function registrarse(){
        if(isset($_SESSION['correoCliente'])){
            header("Location:?controlador=paginas&accion=inicio");
        }
        else{
            include_once("vistas/clientes/crear.php");
        }
    }

    public function editar(){
        // Identificar si hay un envío post, para poder modificar
        if($_POST){
            $id=$_POST['id'];
            $nombre=$_POST['name'];
            $correo=$_POST['email'];
            empleado::editar($id,$nombre,$correo);
            header("Location:./?controlador=empleados&accion=inicio");
        }
        // Sino, consulto los datos, Recibimos el parametro
        $id=$_GET['id'];
        $empleado=(empleado::buscar($id));
        include_once("vistas/empleados/editar.php");
    }

    public function borrar(){
        // Recibimos el parametro
        $id=$_GET['id'];
        empleado::borrar($id);
        header("Location:./?controlador=empleados&accion=inicio");
    }
}

?>