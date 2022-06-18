<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class articulosModel extends BD{

    public $id_categoria;
    public $categoria;

    public $id_proveedores;
    public $nombre_proveedor;

    public $id_articulos;
    public $nombre_articulo;
    public $codigo_articulo;
    public $descripcion;
    public $costo;
    public $precio_venta;
    public $imagen;
    public $cantidad;
    public $estado;
    public $descuento;
    
    // Creamos un constructor que nos va a ayudar a recibir informacion 
    // Y que la consulta se cree a partir de objetos
    public function  __construct($id_categoria,$categoria,$id_proveedores,$nombre_proveedor,$costo,$id_articulos,$nombre_articulo,$codigo_articulo,$descripcion,$precio_venta,$imagen,$cantidad,$estado,$descuento){
        $this->id_categoria=$id_categoria;
        $this->categoria=$categoria;
        $this->id_proveedores=$id_proveedores;
        $this->nombre_proveedor=$nombre_proveedor;
        $this->costo=$costo;
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
        $listaArticulos=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT categoria.categoria, proveedores.nombre_proveedor, articulos.id_articulos, articulos.nombre_articulo, articulos.codigo_articulo, articulos.descripcion, articulos.costo, articulos.precio_venta, articulos.imagen, articulos.cantidad, articulos.estado, articulos.descuento 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria
        INNER JOIN proveedores ON proveedores.id_proveedores=articulos.id_proveedores  
        ORDER BY articulos.id_articulos ASC");
        foreach($sql->fetchAll() as $articulos){
            $listaArticulos[]=new articulosModel($articulos['id_categoria'],$articulos['categoria'],$articulos['id_proveedores'],$articulos['nombre_proveedor'],$articulos['costo'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listaArticulos;
    }

    // Consultar Artículos por id
    public static function consultarArticulosPorID($id_articulos){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT categoria.categoria, categoria.id_categoria, proveedores.id_proveedores, proveedores.nombre_proveedor, articulos.* 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        INNER JOIN proveedores ON proveedores.id_proveedores=articulos.id_proveedores 
        WHERE articulos.id_articulos=?");
        $sql->execute(array($id_articulos));
        $articulos=$sql->fetch(PDO::FETCH_LAZY);
        return $articulos;
    }

    // Crear/Insertar Artículos
    public static function crear($id_categoria, $codigo_articulo, $nombre_articulo, $descripcion, $costo, $precio_venta, $cantidad, $id_proveedores, $estado, $descuento, $imagen){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("INSERT INTO articulos (`id_categoria`, `codigo_articulo`, `nombre_articulo`, `descripcion`, `costo`, `precio_venta`, `cantidad`, `id_proveedores`, `estado`, `descuento`, `imagen`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)"); 
        $sql->execute(array($id_categoria, $codigo_articulo, $nombre_articulo, $descripcion, $costo, $precio_venta, $cantidad, $id_proveedores, $estado, $descuento, $imagen));
    }

    // Borrar Artículos por id
    public static function borrar($id_articulos){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("DELETE FROM articulos WHERE id_articulos=?");
        $sql->execute(array($id_articulos));       
    }

    // Borrar Imagen
    public static function borrarImagen($id_articulos){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("SELECT imagen FROM articulos WHERE id_articulos=?");
        $sql->execute(array($id_articulos));
        $borrarimagenn=$sql->fetch(PDO::FETCH_LAZY);
        return $borrarimagenn;
    }

    // Editar Artículos
    public static function editarArticulos($nombre_articulo, $descripcion, $costo, $precio_venta, $cantidad, $id_proveedores, $estado, $id_categoria, $descuento, $id_articulos){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("UPDATE articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        INNER JOIN proveedores ON proveedores.id_proveedores=articulos.id_proveedores
        SET articulos.nombre_articulo = ?, articulos.descripcion = ?, articulos.costo = ?, articulos.precio_venta = ?, articulos.cantidad = ?, articulos.id_proveedores = ?, articulos.estado = ?, articulos.id_categoria = ?, articulos.descuento = ? WHERE articulos.id_articulos = ?");
        $sql->execute(array($nombre_articulo, $descripcion, $costo, $precio_venta, $cantidad, $id_proveedores, $estado, $id_categoria, $descuento, $id_articulos));
        // LOGIN  
    }

    // Eliminar artículos por ID
    public static function eliminarArticulosPorID($id_articulos){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("DELETE FROM articulos WHERE id_articulos = ?");
        return $sql->execute(array($id_articulos));
    }

}
?>