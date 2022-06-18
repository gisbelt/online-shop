<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class categoriasModel extends BD {

    public $id_categoria;
    public $categoria;
    public $descripcion_categoria;

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
    
    public function  __construct($id_categoria,$categoria,$descripcion_categoria,$id_proveedores,$nombre_proveedor,$costo,$id_articulos,$nombre_articulo,$codigo_articulo,$descripcion,$precio_venta,$imagen,$cantidad,$estado,$descuento){
        $this->id_categoria=$id_categoria;
        $this->categoria=$categoria;
        $this->descripcion_categoria=$descripcion_categoria;

        $this->id_proveedores=$id_proveedores;
        $this->nombre_proveedor=$nombre_proveedor;

        $this->id_articulos=$id_articulos;
        $this->nombre_articulo=$nombre_articulo;
        $this->codigo_articulo=$codigo_articulo;
        $this->descripcion=$descripcion;
        $this->costo=$costo;
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
            $listaCategoria[]=new categoriasModel($categoria['id_categoria'],$categoria['categoria'],$categoria['descripcion'],$articulos['id_proveedores'],$articulos['nombre_proveedor'],$articulos['costo'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listaCategoria;
    }

    // Buscar artículos por categoría
    public static function buscar($categoria){
        $listarCategorias=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->prepare("SELECT articulos.*, categoria.categoria, proveedores.nombre_proveedor 
        FROM articulos 
        INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
        INNER JOIN proveedores ON proveedores.id_proveedores=articulos.id_proveedores
        WHERE categoria.categoria=?");
        $sql->execute(array($categoria));
        foreach($sql->fetchAll() as $articulos){
            $listarCategorias[]=new categoriasModel($categoria['id_categoria'],$articulos['categoria'],$articulos['descripcion'],$articulos['id_proveedores'],$articulos['nombre_proveedor'],$articulos['costo'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listarCategorias;    
        // PDO::FETCH_LAZY 
    }

    // Consultar Categoria Por ID
    public static function consultarCategoriaPorID($id_categoria){
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->prepare("SELECT categoria.* FROM categoria WHERE id_categoria=?");
        $sql->execute(array($id_categoria));
        $categoria=$sql->fetch(PDO::FETCH_LAZY);
        return $categoria;   
    }

    // Crear/Insertar Categorias
    public static function crear($id_categoria, $categoria, $descripcion_categoria){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("INSERT INTO categoria (`id_categoria`, `categoria`, `descripcion`) 
        VALUES (?,?,?)"); 
        $sql->execute(array($id_categoria, $categoria, $descripcion_categoria));
    }

    // Editar categoria
    public static function editarCategoria($categoria, $descripcion_categoria, $id_categoria){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("UPDATE categoria 
        SET categoria = ?, descripcion = ?
        WHERE id_categoria = ?");
        $sql->execute(array($categoria, $descripcion_categoria, $id_categoria));
    }

    //Eliminar categoría por ID 
    public static function eliminarCategoriaPorID($id_categoria){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        return $sql->execute(array($id_categoria));
    }
}
?>