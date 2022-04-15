<?php
session_start();
class articulos{

    public $id_categoria;
    public $categoria;

    public $id_articulos;
    public $nombre_articulo;
    public $codigo_articulo;
    public $descripcion;
    public $precio_venta;
    public $imagen;
    public $cantidad;
    public $estado;
    public $descuento;
    
    // Creamos un constructor que nos va a ayudar a recibir informacion 
    // Y que la consulta se cree a partir de objetos
    // Creará lista de objetos para poder leer la informacion 
    public function  __construct($id_categoria,$categoria,$id_articulos,$nombre_articulo,$codigo_articulo,$descripcion,$precio_venta,$imagen,$cantidad,$estado,$descuento){
        $this->id_categoria=$id_categoria;
        $this->categoria=$categoria;
        $this->id_articulos=$id_articulos;
        $this->nombre_articulo=$nombre_articulo;
        $this->codigo_articulo=$codigo_articulo;
        $this->descripcion=$descripcion;
        $this->precio_venta=$precio_venta;
        $this->imagen=$imagen;
        $this->cantidad=$cantidad;
        $this->estado=$estado;
        $this->descuento=$descuento;
    }

    // Consultar todos los artículos
    public static function consultarArticulos(){
        //Arreglo para almacenar todos los empleados que vamos a recuperar de la base de datos
        $listaArticulos=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.id_articulos, articulos.nombre_articulo, articulos.codigo_articulo, articulos.descripcion, articulos.precio_venta, articulos.imagen, articulos.cantidad, articulos.estado, articulos.descuento FROM articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria ORDER BY articulos.id_articulos ASC");
        // recuperar la información para almacenarla en la lista 
        // fetchAll va a tener todos los registros y lo vamos a recibir como si fuera uno 
        foreach($sql->fetchAll() as $articulos){
            $listaArticulos[]=new articulos($articulos['id_categoria'],$articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listaArticulos;
    }

    // Crear/Insertar Artículos
    public static function crear($id_categoria, $codigo_articulo, $nombre_articulo, $descripcion, $precio_venta, $cantidad, $estado, $descuento, $imagen){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("INSERT INTO articulos (`id_categoria`, `codigo_articulo`, `nombre_articulo`, `descripcion`, `precio_venta`, `cantidad`, `estado`, `descuento`, `imagen`) VALUES (?,?,?,?,?,?,?,?,?)"); 
        $sql->execute(array($id_categoria,$codigo_articulo, $nombre_articulo, $descripcion, $precio_venta, $cantidad, $estado, $descuento, $imagen));
    }

    // Borrar Artículos por id
    public static function borrar($id_articulos){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("DELETE FROM articulos WHERE id_articulos=?");
        $sql->execute(array($id_articulos));       
    }

    // Borrar Imagen
    public static function borrarImagen($id_articulo){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT imagen FROM articulos WHERE id_articulos=?");
        $sql->execute(array($id_articulos));
        $borrarimagenn=$sql->fetch(PDO::FETCH_LAZY);
        //Funciona en el controlador, pero aquí no.     
    }

    // Consultar Artículos por id
    public static function buscar($id_articulos){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT categoria.categoria, categoria.id_categoria, articulos.* FROM articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria WHERE articulos.id_articulos=?");
        $sql->execute(array($id_articulos));
        $articulos=$sql->fetch();
        return new articulos($articulos['id_categoria'],$articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);

    }

    // Editar Artículos
    public static function editar($nombre_articulo, $descripcion, $precio_venta, $cantidad, $estado, $id_categoria, $descuento, $id_articulos){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("UPDATE articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria SET articulos.nombre_articulo = ?, articulos.descripcion = ?, articulos.precio_venta = ?, articulos.cantidad = ?, articulos.estado = ?, articulos.id_categoria = ?, articulos.descuento = ? WHERE articulos.id_articulos = ?");
        $sql->execute(array($nombre_articulo, $descripcion, $precio_venta, $cantidad, $estado, $id_categoria, $descuento, $id_articulos));
        // LOGIN  
    }

}
?>