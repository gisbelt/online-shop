<?php

class BD{
    private static $instancia=NULL;

    // Crear una instancia a partir de una conexión 
    public static function crearInstancia(){
        // Si no hay una conexion, créala
        if(!isset(self::$instancia)){
            // Me servirá para cambiar el acceso o algunas propiedades que va a requerir mi conexion  
            // Para notificar de errores ATTR_ERRMODE
            $opcionesPDO[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
            // Creando la instancia
            self::$instancia= new PDO('mysql:host=localhost;dbname=casacarlina','root','123456',$opcionesPDO);
            // echo "conexion realizada";
        }
        return self::$instancia;
    }
}

?>