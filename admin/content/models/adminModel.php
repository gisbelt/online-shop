<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class adminModel extends BD{

    public $id_admin;
    public $cedula;
    public $nombre;
    public $correo;
    public $telefono;
    public $direccion;  
    public $contrasenia;
    
    public static function login($correo){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT correo,contrasenia,nombre 
        FROM administrador WHERE correo=?"); 
        $sql->execute(array($correo));
        $consultarAdmin=$sql->fetch(PDO::FETCH_LAZY);
        return $consultarAdmin;
    }

    public static function validarLogin(){
        header("Cache-control: private");
        header("Cache-control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        // Si la sesion esta vacía o no hay usuario logueado, redirecciona al login
        if(!isset($_SESSION['correo'])){
            header("Location:?url=login");     
        }else{
            // sino, si ese usuario tiene un valor, imprime esa información
            if($_SESSION['correo']=='ok'){
                $nombreAdmin=$_SESSION['nombreAdmin'];
                $date=$_SESSION['date'];
            }
        }
    }

}
?>