<?php
// Interaccion con la base de datos 
class empleado{

    public $id;
    public $nombre;
    public $correo;
    
    // Creamos un constructor que nos va a ayudar a recibir informacion 
    // Y que la consulta se cree a partir de objetos
    // Creará lista de objetos para poder leer la informacion 
    public function  __construct($id,$nombre,$correo){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->correo=$correo;
    }

    public static function consultar(){
        $listaEmpleados=[]; //Arreglo para almacenar todos los empleados que vamos a recuperar de la base de datos
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT * FROM empleados");
        // recuperar la información para almacenarla en la lista 
        // fetchAll va a tener todos los registros y lo vamos a recibir como si fuera uno 
        foreach($sql->fetchAll() as $empleados){
            $listaEmpleados[]=new empleado($empleados['id'],$empleados['nombre'],$empleados['correo']);
        }
        return $listaEmpleados;
    }


    public static function crear($nombre, $correo){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("INSERT INTO empleados (nombre, correo) VALUES (?,?)");
        $sql->execute(array($nombre,$correo));

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