<?php
session_start();
class tienda{

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
    public function  __construct($categoria,$id_articulos,$nombre_articulo,$codigo_articulo,$descripcion,$precio_venta,$imagen,$cantidad,$estado,$descuento){
        // $this->id_categoria=$id_categoria;
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
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.id_articulos, articulos.nombre_articulo, articulos.codigo_articulo, articulos.descripcion, articulos.precio_venta, articulos.imagen, articulos.cantidad, articulos.estado, articulos.descuento FROM articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria WHERE articulos.estado='Activo'");
        // recuperar la información para almacenarla en la lista 
        // fetchAll va a tener todos los registros y lo vamos a recibir como si fuera uno 
        foreach($sql->fetchAll() as $articulos){
            $listaArticulos[]=new tienda($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listaArticulos;
    }

}
?>