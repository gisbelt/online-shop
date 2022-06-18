<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class proveedoresModel extends BD {

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
    
    public function  __construct($id_proveedores,$nombre_proveedor,$id_categoria,$categoria,$id_articulos,$nombre_articulo,$codigo_articulo,$descripcion,$precio_venta,$imagen,$cantidad,$estado,$descuento){
        $this->id_categoria=$id_categoria;
        $this->categoria=$categoria;
        $this->id_proveedores=$id_proveedores;
        $this->nombre_proveedor=$nombre_proveedor;
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

    // Consultar todas los proveedores
    public static function consultarProveedores(){
        $listaProveedores=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT id_proveedores, nombre_proveedor FROM proveedores");
        foreach($sql->fetchAll() as $proveedores){
            $listaProveedores[]=new proveedoresModel($proveedores['id_proveedores'],$proveedores['nombre_proveedor'],$categoria['id_categoria'],$categoria['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listaProveedores;
    }

    // Crear/Insertar Proveedores
    public static function crear($id_proveedores, $nombre_proveedor, $telefono, $correo_proveedor, $direccion){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("INSERT INTO proveedores (`id_proveedores`, `nombre_proveedor`, `telefono_proveedor`, `correo_proveedor`, `direccion`) VALUES (?,?,?,?,?)"); 
        $sql->execute(array($id_proveedores, $nombre_proveedor, $telefono, $correo_proveedor, $direccion));
    }

}
?>