<?php
session_start();
class categorias{

    public $id_categoria;
    public $categoria;
    
    public function  __construct($id_categoria,$categoria){
        $this->id_categoria=$id_categoria;
        $this->categoria=$categoria;
    }

    // Consultar todas las categorias
    public static function consultarCategoria(){
        //Arreglo para almacenar todos los empleados que vamos a recuperar de la base de datos
        $listaCategoria=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT * FROM categoria");
        // recuperar la información para almacenarla en la lista 
        // fetchAll va a tener todos los registros y lo vamos a recibir como si fuera uno 
        foreach($sql->fetchAll() as $categoria){
            $listaCategoria[]=new categorias($categoria['id_categoria'],$categoria['categoria']);
        }
        return $listaCategoria;
    }

    // Buscar artículos por categoría
    public static function buscar($categoria){
        // $conexionBD=BD::crearInstancia();
        // $sql= $conexionBD->prepare("SELECT articulos.*, categoria.categoria FROM articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria WHERE categoria.categoria=?");
        // $sql->execute(array($categoria));
        // $articulos=$sql->fetch();
        // return new categorias($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        
        //Arreglo para almacenar todos los empleados que vamos a recuperar de la base de datos
        $listarArticulos=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->prepare("SELECT articulos.*, categoria.categoria FROM articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria WHERE categoria.categoria=?");
        $sql->execute(array($categoria));
        // recuperar la información para almacenarla en la lista 
        // fetchAll va a tener todos los registros y lo vamos a recibir como si fuera uno 
        foreach($sql->fetchAll() as $articulos){
            $listarArticulos[]=new categorias($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listarArticulos;    
        // PDO::FETCH_LAZY 

        
    }

}
?>