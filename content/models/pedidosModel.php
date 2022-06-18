<?php
namespace content\models;

use content\config\conection\database as BD;
use PDO as pdo;

class pedidosModel extends BD {

    public $id_pedido;
    public $id_cliente;
    public $cod_comprobante;
    public $fecha_hora;
    public $estado_pedido;
    public $total_pedido;

    public $id_detalle_pedido;
    public $cantidad_detallePedido;
    public $precio_venta_detallePedido;

    public $id_forma_de_pago;
    public $forma_de_pago;

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
    
    public function  __construct($id_forma_de_pago,$forma_de_pago){
        $this->id_forma_de_pago=$id_forma_de_pago;
        $this->forma_de_pago=$forma_de_pago;

        // $this->id_categoria=$id_categoria;
        // $this->categoria=$categoria;
        // $this->id_articulos=$id_articulos;
        // $this->nombre_articulo=$nombre_articulo;
        // $this->codigo_articulo=$codigo_articulo;
        // $this->descripcion=$descripcion;
        // $this->precio_venta=$precio_venta;
        // $this->imagen=$imagen;
        // $this->cantidad=$cantidad;
        // $this->estado=$estado;
        // $this->descuento=$descuento;
    }

    // Consultar todas las formas de pago
    public static function consultarFormaDePago(){
        $listaFormaDePago=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT * FROM forma_de_pago");
        foreach($sql->fetchAll() as $formaDePago){
            $listaFormaDePago[]=new pedidosModel($formaDePago['id_forma_de_pago'],$formaDePago['forma_de_pago']);
        }
        return $listaFormaDePago;
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
    }

}
?>