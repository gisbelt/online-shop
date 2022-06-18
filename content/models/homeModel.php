<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class homeModel extends BD {

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
    
    // Creará lista de objetos para poder leer la informacion 
    public function  __construct($categoria,$id_articulos,$nombre_articulo,$codigo_articulo,$descripcion,$precio_venta,$imagen,$cantidad,$estado){
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
    }

    public static function consultarArticulos(){
        $listaArticulos=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.* 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        WHERE articulos.estado='Activo' limit 9");
        // fetchAll va a tener todos los registros y lo vamos a recibir como si fuera uno 
        foreach($sql->fetchAll() as $articulos){
            $listaArticulos[]=new homeModel($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado']);
        }
        return $listaArticulos;
    }

    //Consultar todos los articulos con orden descendente
    public static function consultarArticulosOrdenDesc(){
        $listaArticulos=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.* 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        WHERE articulos.estado='Activo'
        ORDER BY articulos.id_articulos desc ");
        // fetchAll va a tener todos los registros y lo vamos a recibir como si fuera uno 
        foreach($sql->fetchAll() as $articulos){
            $listaArticulos[]=new homeModel($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado']);
        }
        return $listaArticulos;
    }

    // Descuento 20% todos
    public static function consultarArticulosDescuento(){
        $listaArticulosDes=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.* 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        WHERE articulos.descuento='20%' ");
        foreach($sql->fetchAll() as $articulos){
            $listaArticulosDes[]=new homeModel($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado']);
        }
        return $listaArticulosDes;
    }

    // Descuento 20% solo 4 resultados
    public static function consultarArticulosDescuento2(){
        $listaArticulosDes2=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.* 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        WHERE articulos.descuento='20%' limit 4");
        foreach($sql->fetchAll() as $articulos){
            $listaArticulosDes2[]=new homeModel($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado']);
        }
        return $listaArticulosDes2;
    }

    // Descuento 10% solo 4 resultados
    public static function consultarArticulosDescuento3(){
        $listaArticulosDes2=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.* 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        WHERE articulos.descuento='10%' limit 4");
        foreach($sql->fetchAll() as $articulos){
            $listaArticulosDes2[]=new homeModel($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado']);
        }
        return $listaArticulosDes2;
    }

    // Sin Descuento solo 4 resultados
    public static function consultarArticulosDescuento4(){
        $listaArticulosDes2=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.* 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria
         WHERE articulos.descuento='No' limit 4");
        foreach($sql->fetchAll() as $articulos){
            $listaArticulosDes2[]=new homeModel($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado']);
        }
        return $listaArticulosDes2;
    }

}
?>