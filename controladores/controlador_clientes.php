<?php

include_once("modelos/clientes.php");
include_once("modelos/tipo_documento.php");
include_once("modelos/codigo_telefono.php");
include_once("modelos/conexion.php");
session_start();

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
                $conexionBD=BD::crearInstancia();
                $sql= $conexionBD->prepare("SELECT correo_cliente, contrasenia, nombre_cliente FROM clientes WHERE correo_cliente=?"); 
                $sql->execute(array($correo));
                $consultarCliente=$sql->fetch(PDO::FETCH_LAZY);
                if($consultarCliente->contrasenia==$contrasenia && $consultarCliente->correo_cliente==$correo){
                    // session_start();
                    $_SESSION['correo_cliente'] = "ok";
                    $_SESSION['correoCliente']=$consultarCliente->correo_cliente;
                    $_SESSION['nombreCliente']=$consultarCliente->nombre_cliente;
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

    public function crear(){
              
        $nombre_cliente=$_POST['nombre_cliente'];
        $apellido_cliente=$_POST['apellido_cliente'];
        $correo_cliente=$_POST['correo_cliente'];
        $contrasenia=$_POST['contrasenia'];
        $contrasenia2=$_POST['contrasenia2'];

            // if($contrasenia2 != $contrasenia){
            //     $mensaje1 = "Error, la confirmación de contraseña no es correcta";
            // }
            // else{
                // ejecutamos 
                clientes::crear($nombre_cliente,$apellido_cliente, $correo_cliente, $contrasenia);       
                // header("location:./?controlador=paginas&accion=inicio");
            // }                      
        
        include_once("vistas/clientes/crear.php");
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