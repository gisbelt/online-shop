<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class tiendaModel extends BD{

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

    // Consultar todos los artículos activos
    public static function consultarArticulos(){
        $listaArticulos=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.*
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        WHERE articulos.estado='Activo' LIMIT 7");
        foreach($sql->fetchAll() as $articulos){
            $listaArticulos[]=new tiendaModel($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listaArticulos;
    }

    // Consultar artículo por ID
    public static function consultarArticulosPorID($id_articulos){
        $listaArticulos2=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->prepare("SELECT categoria.categoria, articulos.id_articulos, articulos.nombre_articulo, articulos.codigo_articulo, articulos.descripcion, articulos.precio_venta, articulos.imagen, articulos.cantidad, articulos.estado, articulos.descuento FROM articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria WHERE articulos.id_articulos=?");
        $sql->execute(array($id_articulos));
        foreach($sql->fetchAll() as $articulos){
            $listaArticulos2[]=new tiendaModel($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listaArticulos2;
    }

    // Resultados artículos si el total es mayor a 0 y estado es activo
    public static function resultadosArticulos(){
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT COUNT(*)as total_articulos FROM articulos 
        WHERE articulos.estado='Activo'");
        $sql->execute();
        $get_total = $sql->fetch(PDO::FETCH_LAZY);        
        $num_total_rows = $get_total['total_articulos'];

        $item_per_page = 7;
        if ($num_total_rows > 0) {
            $pages = ceil($get_total[0]/$item_per_page); 
            $articulos=tiendaModel::consultarArticulos();
        }
        return $articulos;
    }

    //Paginación: total resultados para los números de la paginacion
    // NO ESTÁ LISTO 
    public static function paginacion(){
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT COUNT(*)as total_articulos FROM articulos WHERE articulos.estado='Activo'");
        $sql->execute();
        $get_total = $sql->fetch(PDO::FETCH_LAZY);        
        $num_total_rows = $get_total['total_articulos'];
        // Asignamos el total de resultados a mostrar por página
        $item_per_page = 7;
        if ($num_total_rows > 0) {
            $pages = ceil($get_total[0]/$item_per_page);
        }
        return $pages;
    }
}
?>