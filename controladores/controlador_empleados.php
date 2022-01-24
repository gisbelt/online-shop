<?php

include_once("modelos/empleado.php");
include_once("./modelos/conexion.php");
// Instancia (la clase BD llamando al método crearInstancia)
BD::crearInstancia();

class controladorEmpleados{
    // metodos
    public function inicio(){
        // El acceso a estos datos, los vamos a obtener a través de la vista en 
        // vista/empleado/inicio
        $empleados=empleado::consultar();

        include_once("vistas/empleados/inicio.php");
    }

    public function crear(){
        // Recepcionamos los datos por medio de post
        if($_POST){
            print_r($_POST);
            $nombre=$_POST['name'];
            $correo=$_POST['email'];
            // ejecutamos 
            empleado::crear($nombre,$correo);
            header("Location:./?controlador=empleados&accion=inicio");
        }
        include_once("vistas/empleados/crear.php");
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