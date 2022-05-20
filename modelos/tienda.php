<?php
session_start();
class tienda{

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
        $sql=$conexionBD->query("SELECT categoria.categoria, articulos.id_articulos, articulos.nombre_articulo, articulos.codigo_articulo, articulos.descripcion, articulos.precio_venta, articulos.imagen, articulos.cantidad, articulos.estado, articulos.descuento FROM articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria WHERE articulos.estado='Activo' LIMIT 7");
        foreach($sql->fetchAll() as $articulos){
            $listaArticulos[]=new tienda($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
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
            $listaArticulos2[]=new tienda($articulos['categoria'],$articulos['id_articulos'],$articulos['nombre_articulo'],$articulos['codigo_articulo'],$articulos['descripcion'],$articulos['precio_venta'],$articulos['imagen'],$articulos['cantidad'],$articulos['estado'],$articulos['descuento']);
        }
        return $listaArticulos2;
    }

    // Resultados artículos si el total es mayor a 0
    public static function resultadosArticulos(){
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query("SELECT COUNT(*)as total_articulos FROM articulos WHERE articulos.estado='Activo'");
        $sql->execute();
        $get_total = $sql->fetch(PDO::FETCH_LAZY);        
        $num_total_rows = $get_total['total_articulos'];

        $item_per_page = 7;
        if ($num_total_rows > 0) {
            $pages = ceil($get_total[0]/$item_per_page); 
            $articulos=tienda::consultarArticulos();
        }

        return $articulos;
    }

    //Paginación: total resultados para los números de la paginacion
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

    public static function paginacion2(){
        $html = '';
        $page = $_GET['page'];
        $item_per_page = 7;
        $offset = ($page - 1) * $item_per_page;
        // sleep(1);  
        $conexionBD=BD::crearInstancia();
        $sql=$conexionBD->query(
            "SELECT categoria.categoria, articulos.id_articulos, articulos.nombre_articulo, articulos.codigo_articulo, articulos.descripcion, articulos.precio_venta, articulos.imagen, articulos.cantidad, articulos.estado, articulos.descuento 
            FROM articulos INNER JOIN categoria ON categoria.id_categoria=articulos.id_categoria 
            WHERE articulos.estado='Activo' 
            LIMIT '.$offset.', '.$item_per_page"); 
        if ($sql->num_rows > 0) {
            foreach ($sql->fetch_lazy() as $row) {
                $html .= '<div class="row fila_tienda center">';
                $html .= '<div class="col-md-3 ">
                            <img class="card-img-top" src="./administrador/img/'.$row['imagen'].'" alt="" style="width:100%;" alt="Card image cap">
                         </div>';
                $html .= '<div class="col-md-6">
                            <h4 class="card-title text-danger">'.$row['nombre_articulo'].'</h4>
                            <p class="card-text">'.$row['descripcion'].'</p>
                            <label for=""><strong>Categoría: </strong></label>
                            <p class="card-text">'.$row['categoria'].'</p>
                        </div>';
                $html .= '<div class="col-md-3">
                            <h4 class="card-title text-success">$'.$row['precio_venta'].'</h4>
                            <form method="POST" >
                                <input type="hidden" name="id_articulos" value="<?php echo $art->id_articulos ?>">
                                <button type="submit" name="agregar_carrito" class="btn btn-danger" >Añadir al carrito</button>
                            </form>  
                         </div>  ';
                $html .= '</div>     
                        <br>';
            }
        }        
        echo $html;
        // return $sql;
    }


}
?>