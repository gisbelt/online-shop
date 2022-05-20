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

    public static function login($correo){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT correo_cliente, contrasenia, nombre_cliente FROM clientes WHERE correo_cliente=?"); 
        $sql->execute(array($correo));
        $consultarCliente=$sql->fetch(PDO::FETCH_LAZY);
        return $consultarCliente;
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

    // Crear/Registrar Clientes
    public static function crear($nombre_cliente,$apellido_cliente,$correo_cliente,$contrasenia){
        // Validamos que no haya el mismo correo 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->prepare("SELECT COUNT(*) as numrows FROM clientes WHERE correo_cliente = ?");
        $sql->execute(array($correo_cliente));
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if($row["numrows"] > 0){
            $result = [msj => "0"];
            echo json_encode($result);
            die();
        }
        else {
            $sql2= $conexionBD->prepare("INSERT INTO clientes (nombre_cliente, apellido_cliente, correo_cliente, contrasenia, id_tipo_documento, id_codigo_telefono) VALUES (:nombre_cliente,:apellido_cliente,:correo_cliente,:contrasenia, '1', '1')");
            $sql2->bindParam(":nombre_cliente", $nombre_cliente);
            $sql2->bindParam(":apellido_cliente", $apellido_cliente);
            $sql2->bindParam(":correo_cliente", $correo_cliente);
            $sql2->bindParam(":contrasenia", $contrasenia);
            $sql2->execute();
            $result = [msj => "1"];
            echo json_encode($result);
        }
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