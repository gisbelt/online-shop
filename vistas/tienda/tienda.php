<br>
<div class="container">
<div class="row">
    <div class="list-group col-md-2">
        <a href="#" class="list-group-item list-group-item-action active disabled">Categorías</a>
        <?php  foreach($categoria as $cat) { ?>                                     
            <a href="?controlador=categoria&accion=categoria&id_categoria=<?php echo $cat->id_categoria;?>" class="list-group-item list-group-item-action" name="id_categoria" id="<?php echo $cat->id_categoria;?>"><?php echo $cat->categoria;?></a>
        <?php  } ?>
    </div>  
    

    <div class="col-md-10">
        <?php foreach($articulos as $art) { ?>
        <div class="row fila_tienda centrar_vertical">
            <div class="col-md-3 ">
              <a href="?controlador=tienda&accion=ver_mas&id_articulos=<?php echo $art->id_articulos;?>" class="text-decoration-none">
                  <img class="card-img-top" src="./administrador/asset/img/<?php echo $art->imagen;?>" alt="" style="width:100%;" alt="Card image cap">
              </a>
            </div>
            <div class="col-md-6">
                <a href="?controlador=tienda&accion=ver_mas&id_articulos=<?php echo $art->id_articulos;?>" class="text-decoration-none">
                  <h4 class="card-title text-danger"><?php echo $art->nombre_articulo;?></h4>
                </a>
                <p class="card-text"><?php echo $art->descripcion;?></p>
                <label for=""><strong>Categoría: </strong></label>
                <p class="card-text"><?php echo $art->categoria;?></p>
            </div>
            <div class="col-md-3">
                <h4 class="card-title text-success">$<?php echo number_format($art->precio_venta, 2);?></h4>
                <form method="POST" >
                    <input type="hidden" name="id_articulos" value="<?php echo $art->id_articulos ?>">
                    <button type="submit" name="agregar_carrito" class="btn btn-danger" >Añadir al carrito</button>
                </form>  
            </div>  
        </div>     
        <br>
        <?php  } ?>
        
        <?php 
        if ($pages > 1) {
        ?>
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center">
            <!-- flecha  -->
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="visually-hidden">Previous</span>
              </a>
            </li>
            <!-- flecha  -->
            <?php 
            for ($i=1;$i<=$pages;$i++) { 
            $class_active = '';
            if ($i == 1) {
                $class_active = 'active';
            }
            ?>
            <li class="page-item <?php echo $class_active?> numero_paginacion"><a class="page-link link_paginacion" data="<?php echo $i?>" href=""><?php echo $i?></a></li>
            <?php } ?>
            <!-- flecha  -->
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="visually-hidden">Next</span>
              </a>
            </li>
            <!-- flecha  -->
          </ul>
        </nav>
        <?php 
        }
        ?>

    </div>
</div>
</div>
<!-- 
float-left; alinea a la izquierda
float-right: alinea a la derecha
clearfix: evita que el contenido se pise en las alineaciones
floar-[tamaño]-[alineación]: hace que los elementos cambien de alineación, según nos interese en cada tamaño de pantalla.
mx-auto: para alinear elementos en el centro
justify-content-start: alinea el contenido horizontalmente a la izquierda
justify-content-center: alinea el contenido al centro
justify-content-right: alinea el contenido a la derecha
justify-content-between: alinea el contenido dejando espacios en blanco entre las columnas
justify-content-around: es igual que between, pero deja espacio también al principio y al final
align-items-center: alinea los elementos de forma vertical al centro del contenedor
align-items-start: alinea los elementos de forma vertical arriba del contenedor(por defecto)
align-items-end: alinea los elementos de forma vertical abajo del contenedor
align-self-start: alinea el elemento en si mismo de forma vertical arriba
align-self-center: alinea el elemento en si mismo de forma vertical centrado
align-self-end: alinea el elemento en si mismo de forma vertical abajo
fixed-top: deja fijo el contenido arriba del navegador
fixed-bottom: deja fijo el contenido abajo del navegador 
-->