<?php
session_start();
// Interaccion con la base de datos 
class Login{

    public $id_admin;
    public $cedula;
    public $nombre;
    public $correo;
    public $telefono;
    public $direccion;  
    public $contrasenia;
    
    public static function consultar($correo){
        //Error aquí
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT correo,contrasenia,nombre FROM administrador WHERE correo=?"); 
        $sql->execute(array($correo));
        $consultarAdmin=$sql->fetch();
        return new Login($consultarAdmin['correo'],$consultarAdmin['contrasenia'],$consultarAdmin['nombre']);         
    }


}
?>