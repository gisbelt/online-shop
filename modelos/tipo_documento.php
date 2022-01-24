<?php
// session_start();
class tipoDocumento{

    public $id_tipo_documento;
    public $tipo_documento;
    
    public function  __construct($id_tipo_documento,$tipo_documento){
        $this->id_tipo_documento=$id_tipo_documento;
        $this->tipo_documento=$tipo_documento;
    }

    public static function consultarTipoDocumento(){
        //Arreglo para almacenar todos los empleados que vamos a recuperar de la base de datos
        $listaTipoDocumento=[]; 
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT * FROM tipo_documento");
        // recuperar la información para almacenarla en la lista 
        // fetchAll va a tener todos los registros y lo vamos a recibir como si fuera uno 
        foreach($sql->fetchAll() as $tipo_documento){
            $listaTipoDocumento[]=new tipoDocumento($tipo_documento['id_tipo_documento'],$tipo_documento['tipo_documento']);
        }
        return $listaTipoDocumento;
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