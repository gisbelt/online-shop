<?php
// session_start();
class codigoTelefono{

    public $id_codigo_telefono;
    public $codigo_telefono;
    
    public function  __construct($id_codigo_telefono,$codigo_telefono){
        $this->id_codigo_telefono=$id_codigo_telefono;
        $this->codigo_telefono=$codigo_telefono;
    }

    public static function consultarCodigoTelefono(){
        $listaCodigoTelefono=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT * FROM codigo_telefono");
        // recuperar la información para almacenarla en la lista 
        foreach($sql->fetchAll() as $codigo_telefono){
            $listaCodigoTelefono[]=new codigoTelefono($codigo_telefono['id_codigo_telefono'],$codigo_telefono['codigo_telefono']);
        }
        return $listaCodigoTelefono;
    }

    public static function buscar($id_categoria){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare(" SELECT categoria.categoria, articulos.* FROM articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria WHERE categoria.id_categoria=?");
        $sql->execute(array($id_categoria));
        $articulos=$sql->fetch();
        return new categorias($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
    }

}
?>