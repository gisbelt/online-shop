<?php
// Interaccion con la base de datos 
class clientes{

    public $id_cliente;
    public $nombre_cliente;
    public $apellido_cliente;
    public $correo_cliente;
    public $id_tipo_documento;
    public $documento;
    public $direccion;
    public $id_codigo_telefono;
    public $telefono;
    public $contrasenia;

   
    // Creamos un constructor que nos va a ayudar a recibir informacion 
    // Y que la consulta se cree a partir de objetos
    // Creará lista de objetos para poder leer la informacion 
    public function  __construct($id_cliente,$nombre_cliente,$apellido_cliente,$correo_cliente,$id_tipo_documento,$documento,$direccion,$id_codigo_telefono,$telefono,$contrasenia){
        $this->id_cliente=$id_cliente;
        $this->nombre_cliente=$nombre_cliente;
        $this->apellido_cliente=$apellido_cliente;
        $this->correo_cliente=$correo_cliente;
        $this->id_tipo_documento=$id_tipo_documento;
        $this->documento=$documento;
        $this->direccion=$direccion;
        $this->id_codigo_telefono=$id_codigo_telefono;
        $this->telefono=$telefono;
        $this->apellido_cliente=$contrasenia;
    }

    public static function consultar(){
        $listaEmpleados=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT * FROM empleados");
        foreach($sql->fetchAll() as $empleados){
            $listaEmpleados[]=new clientes($empleados['id'],$empleados['nombre'],$empleados['correo']);
        }
        return $listaEmpleados;
    }

    // Crear/Insertar Clientes
    public static function crear_clientes($nombre_cliente, $apellido_cliente, $correo_cliente, $id_tipo_documento, $documento, $direccion, $id_codigo_telefono, $telefono, $contrasenia){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("INSERT INTO cliente (`nombre_cliente`, `apellido_cliente`, `correo_cliente`, `id_tipo_documento`, `documento`, `direccion`, `id_codigo_telefono`, `telefono`, `contrasenia`) VALUES (?,?,?,?,?,?,?,?,?)"); 
        $sql->execute(array($nombre_cliente, $apellido_cliente, $correo_cliente, $id_tipo_documento, $documento, $direccion, $id_codigo_telefono, $telefono, $contrasenia));
        // Error aqui
    }

    // Crear/Registrar Clientes
    public static function crear($nombre_cliente,$apellido_cliente,$correo_cliente,$contrasenia){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("INSERT INTO clientes (nombre_cliente, apellido_cliente, correo_cliente, contrasenia) VALUES (?,?,?,?)"); 
        return $sql->execute([$nombre_cliente, $apellido_cliente, $correo_cliente, $contrasenia]);
        // Error aqui
    }


    public static function borrar($id){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("DELETE FROM empleados WHERE id=?");
        $sql->execute(array($id));

    }

    public static function buscar($id){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT * FROM empleados WHERE id=?");
        $sql->execute(array($id));
        // recuperar registro 
        $empleados=$sql->fetch();
        return new empleado($empleados['id'],$empleados['nombre'],$empleados['correo']);

    }
  

    public static function editar($id,$nombre,$correo){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("UPDATE empleados SET nombre=?, correo=? WHERE id=?");
        $sql->execute(array($nombre,$correo,$id));


    }

}


?>