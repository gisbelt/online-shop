<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class categoriasModel extends BD {

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

    // Consultar todas las categorias
    public static function consultarCategoria(){
        $listaCategoria=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT * FROM categoria");
        foreach($sql->fetchAll() as $categoria){
            // $listaCategoria[]=new categoriasModel($categoria['id_categoria'],$categoria['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
            $listaCategoria[]=new categoriasModel($categoria['id_categoria'],$categoria['categoria']
            ,""
            ,""
            ,""
            ,""
            ,""
            ,""
            ,""
            ,""
            ,"");
        }
        return $listaCategoria;
    }

    // Buscar artículos por categoría
    public static function buscar($categoria){
        $listarCategorias=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->prepare("SELECT articulos.*, categoria.categoria 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        WHERE categoria.categoria=?");
        $sql->execute(array($categoria));
        foreach($sql->fetchAll() as $articulos){
            $listarCategorias[]=new categoriasModel($categoria['id_categoria'],$articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listarCategorias;    
        // PDO::FETCH_LAZY 
    }

}
?>