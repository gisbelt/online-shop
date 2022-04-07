<?php
// Interaccion con la base de datos 
class carrito{

    // Para que funcione la vista, quizas es necesario agregar toda las variables
    // como parametros al constructor 

    public $id_articulos;
    public $id_sesion;

    public $nombre_articulo;
    public $codigo_articulo;
    public $descripcion;
    public $precio_venta;
    public $imagen;
    public $categoria;
    public $cantidad;
    public $estado;
    public $descuento;

   
    // Creamos un constructor que nos va a ayudar a recibir informacion 
    // Y que la consulta se cree a partir de objetos
    // Creará lista de objetos para poder leer la informacion 
    public function  __construct($id_articulos,$nombre_articulo,$descripcion,$precio_venta,$imagen,$categoria){
        $this->id_articulos=$id_articulos;
        $this->nombre_articulo=$nombre_articulo;
        $this->descripcion=$descripcion;
        $this->precio_venta=$precio_venta;
        $this->imagen=$imagen;
        $this->categoria=$categoria;
        $this->id_sesion=$id_sesion;
    }

    // Agregar articulos al carrito
    public static function agregar_al_carrito($id_articulos){
        $conexionBD=BD::crearInstancia();
        // $id_sesion = session_id();
        $id_sesion = $_SESSION['correoCliente'];
        $sql= $conexionBD->prepare("INSERT INTO carrito (id_sesion, id_articulos) VALUES (?,?)"); 
        return $sql->execute([$id_sesion, $id_articulos]);
    }

    public static function obtener_id_articulos_carrito(){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT id_articulos FROM carrito where id_sesion=?");
        // $id_sesion = session_id();
        $id_sesion = $_SESSION['correoCliente'];
        $sql->execute(array($id_sesion));
        return $sql->fetchAll(PDO::FETCH_COLUMN);
    }

    // Ver detalles del carrito de compras
    public static function obtener_detalles_articulos_carrito(){
        $id_sesion = $_SESSION['correoCliente'];
        $listaCarrito=[]; //Arreglo para almacenar todos los empleados que vamos a recuperar de la base de datos
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT articulos.id_articulos, articulos.nombre_articulo, articulos.descripcion, articulos.precio_venta, articulos.imagen, articulos.categoria FROM articulos INNER JOIN carrito ON carrito.id_articulos=articulos.id_articulos WHERE carrito.id_sesion='$id_sesion' ");
        foreach($sql->fetchAll() as $carro){
            $listaCarrito[]=new carrito($carro['id_articulos'],$carro['nombre_articulo'],$carro['descripcion'],$carro['precio_venta'],$carro['imagen'],$carro['categoria']);
        }
        return $listaCarrito;
    }

    //quitar elementos del carrito
    public static function quitar_articulos_carrito($id_articulos){
        $conexionBD=BD::crearInstancia();
        // $id_sesion = session_id();
        $id_sesion = $_SESSION['correoCliente'];
        $sql= $conexionBD->prepare("DELETE FROM carrito WHERE id_sesion = ? AND id_articulos = ?");
        return $sql->execute(array($id_sesion, $id_articulos));
    }

}


?>