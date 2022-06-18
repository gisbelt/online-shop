<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carrito de compras</title>
    <?php $head->Heading(); ?>
</head>
<body>
<!-- Menú -->
<?php require_once "content/component/initComponent.php"; ?>
<!-- Menú -->
<br>
<!-- Contenedo oculto que mostrará la alerta o mensaje de confirmación de eliminación correcta  -->
<div class="alert alert-success" style="display:none;"></div>
    
<!-- container  -->
<div class="row m-0">
    <div class="col-md-8 bg-light">
        <?php foreach($carrito as $car) { $subtotal += $car->precio_venta; ?>
        <div class="row fila_carrito1 p-3" id="articulo<?php echo $car->id_articulos ?>">    
            <div class="col-md-3">
                <img class="card-img-top" src="asset/img/<?php echo $car->imagen; ?>" alt="" style="width:70%;" alt="Card image cap">
            </div>    
            <div class="col-md-6">
                <h4 class="card-title text-danger"><?php echo $car->nombre_articulo; ?></h4>
                <p class="card-text"><?php echo $car->descripcion;?></p>
                <div class="form-group col-md-2">
                    <label for="" class="mb-2"><strong>Cantidad: </strong></label><br>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="1"> 
                </div>
            </div>    
            <div class="col-md-3">
                <h4 class="card-title text-success derecha m-2 precio_venta" id="precio_venta<?php echo $car->id_articulos ?>"><?php echo $car->precio_venta;?></h4>
                <form method="POST" class="derecha m-2">
                    <a name="quitar_carrito" id="<?php echo $car->id_articulos ?>" class="btn btn-secondary quitar_carrito" title="Quitar del carrito"><i class="bi bi-trash"></i></a>
                </form>  
            </div> 
        </div>
        <hr id="divider<?php echo $car->id_articulos ?>"></hr> 
        <?php } ?> 
        
        <div class="derecha mb-2"> 
            <h5 class="card-title m-2"><strong>Subtotal (<?php echo $conteo ?> productos): </strong></h5>      
            <h5 class="card-title text-success subtotal m-2" id="subtotal"><?php echo number_format($subtotal, 2) ?></h5>
        </div>
    </div>

    <div class="col-md-4">
        <div class="row fila_carrito2 p-3 bg-light">
            <!-- Sub Total  -->
            <div class="mb-2 d-none d-md-block">
                <tfoot>
                    <tr>
                        <td><h5 class="card-title m-2 text-center"><strong>Subtotal (<?php echo $conteo ?> productos): </strong></h5></td>
                        <td><h5 class="card-title text-success m-2 text-center" id="subtotal2"><?php echo number_format($subtotal, 2) ?></h5></td>
                    </tr>
                </tfoot>
            </div>
            <!-- Realizar pedido  -->
            <div class="center">
                <form method="POST">
                    <a href="?url=pedidos" name="agregar_pedido" class="btn btn-success " >Realizar pedido</a>
                </form>  
            </div> 
        </div>
    </div>
</div>      
<!-- container  -->

<!-- ********************************* -->

<?php $bottom->Bottom(); ?>
</body>
<br><br>
<footer>
<?php $footer->Footer(); ?>
</footer>
</html>