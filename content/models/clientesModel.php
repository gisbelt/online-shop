<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class clientesModel extends BD{

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

    public $tipo_documento;
    public $codigo_telefono;

    public function  __construct($id_cliente,$nombre_cliente,$apellido_cliente,$correo_cliente,$tipo_documento,$documento,$codigo_telefono,$telefono,$direccion,$id_codigo_telefono,$id_tipo_documento){
        $this->id_cliente=$id_cliente;
        $this->nombre_cliente=$nombre_cliente;
        $this->apellido_cliente=$apellido_cliente;
        $this->correo_cliente=$correo_cliente;
        $this->id_tipo_documento=$id_tipo_documento;
        $this->documento=$documento;
        $this->id_codigo_telefono=$id_codigo_telefono;
        $this->telefono=$telefono;
        $this->direccion=$direccion;

        $this->tipo_documento=$tipo_documento;
        $this->codigo_telefono=$codigo_telefono;
    }

    public static function login($correo){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT correo_cliente, contrasenia, nombre_cliente 
        FROM clientes WHERE correo_cliente=?"); 
        $sql->execute(array($correo));
        $consultarCliente=$sql->fetch(PDO::FETCH_LAZY);
        return $consultarCliente;
    }

    public static function validarLogin(){
        header("Cache-control: private");
        header("Cache-control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        // Si la sesion esta vacía o no hay usuario logueado, redirecciona al login
        if(!isset($_SESSION['correoCliente'])){
            header("Location:?url=home");     
        }else{
            if($_SESSION['correo_cliente']=='ok'){
                $nombreCliente=$_SESSION['nombreCliente'];
                $date=$_SESSION['date'];
            }
        }
    }

    // Consultar datos clientes por correo
    public static function consultarClientesPorCorreo(){
        $listaClientes=[]; 
        $correo_cliente=$_SESSION['correoCliente'];
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT clientes.*, td.*, ct.* FROM clientes 
        INNER JOIN tipo_documento td ON td.id_tipo_documento=clientes.id_tipo_documento 
        INNER JOIN codigo_telefono ct ON ct.id_codigo_telefono=clientes.id_codigo_telefono 
        WHERE clientes.correo_cliente='$correo_cliente'");
        $listaClientes=$sql->fetch(PDO::FETCH_LAZY);
        return $listaClientes;
    }

    // Consultar datos clientes por correo, igual al de arriba pero de otra forma
    public static function consultarClientesPorCorreo2(){
        $listaClientes=[]; 
        $correo_cliente=$_SESSION['correoCliente'];
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT clientes.*, td.*, ct.* FROM clientes 
        INNER JOIN tipo_documento td ON td.id_tipo_documento=clientes.id_tipo_documento 
        INNER JOIN codigo_telefono ct ON ct.id_codigo_telefono=clientes.id_codigo_telefono 
        WHERE clientes.correo_cliente='$correo_cliente'");
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $clientes){
            $listaClientes[]=new clientesModel($clientes['id_cliente'],$clientes['nombre_cliente'],$clientes['apellido_cliente'],$clientes['correo_cliente'],$clientes['tipo_documento'],$clientes['documento'],$clientes['codigo_telefono'],$clientes['telefono'],$clientes['direccion'],$clientes['id_codigo_telefono'], $clientes['id_tipo_documento']);
        }
        return $listaClientes;
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
            $sql2= $conexionBD->prepare("INSERT INTO clientes (nombre_cliente, apellido_cliente, correo_cliente, contrasenia, id_tipo_documento, id_codigo_telefono) 
            VALUES (:nombre_cliente,:apellido_cliente,:correo_cliente,:contrasenia, '1', '1')");
            $sql2->bindParam(":nombre_cliente", $nombre_cliente);
            $sql2->bindParam(":apellido_cliente", $apellido_cliente);
            $sql2->bindParam(":correo_cliente", $correo_cliente);
            $sql2->bindParam(":contrasenia", $contrasenia);
            $sql2->execute();
            $result = [msj => "1"];
            echo json_encode($result);
        }
    }

    // Consultar todas los codigos de teléfono
    public static function consultarCodigoTelefono(){
        // $listaCodigoTelefono=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT * FROM codigo_telefono");
        $listaCodigoTelefono=$sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaCodigoTelefono;
    }

    // Editar nombre y apellido cliente
    public static function editarNombreApellido($nombre_cliente,$apellido_cliente){
        $correo_cliente=$_SESSION['correoCliente'];
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("UPDATE clientes 
        SET nombre_cliente = ?, apellido_cliente = ?
        WHERE correo_cliente = '$correo_cliente'");
        $sql->execute(array($nombre_cliente, $apellido_cliente));
        echo json_encode($sql);
        return $sql;
    }

    // Editar teléfono cliente
    public static function editarTelefono($nombre_cliente,$apellido_cliente){
        $correo_cliente=$_SESSION['correoCliente'];
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("UPDATE clientes 
        SET nombre_cliente = ?, apellido_cliente = ?
        WHERE correo_cliente = '$correo_cliente'");
        $sql->execute(array($nombre_cliente, $apellido_cliente));
        echo json_encode($sql);
        return $sql;
    }

}


?>