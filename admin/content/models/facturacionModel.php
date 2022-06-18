<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class facturacionModel extends BD {

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
    
    public function  __construct($id_articulos,$nombre_articulo,$codigo_articulo,$precio_venta,$cantidad,$estado){
        // $this->id_categoria=$id_categoria;
        // $this->categoria=$categoria;
        $this->id_articulos=$id_articulos;
        $this->nombre_articulo=$nombre_articulo;
        $this->codigo_articulo=$codigo_articulo;
        // $this->descripcion=$descripcion;
        $this->precio_venta=$precio_venta;
        // $this->imagen=$imagen;
        $this->cantidad=$cantidad;
        $this->estado=$estado;
        // $this->descuento=$descuento;
    }

    // Consultar todas las categorias
    public static function consultarCategoria(){
        $listaCategoria=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT * FROM categoria");
        foreach($sql->fetchAll() as $categoria){
            $listaCategoria[]=new categoriasModel($categoria['id_categoria'],$categoria['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listaCategoria;
    }

    // Buscar artículos con estado activo
    public static function consultarArticulosActivo($query){
        $listaArticulos=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT articulos.*, categoria.*
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        WHERE articulos.estado='Activo' 
        AND articulos.nombre_articulo LIKE '%".$query."%'");
        foreach($sql->fetchAll() as $articulos){
            $listaArticulos[]=new facturacionModel($articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['precio_venta'],$articulos['cantidad'],$articulos['estado']);
        }
        return $listaArticulos;
    }

}
?>