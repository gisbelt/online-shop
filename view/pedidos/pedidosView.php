<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pedidos</title>
    <?php $head->Heading(); ?>
</head>
<body>
<!-- Menú -->
<?php require_once "content/component/initComponent.php"; ?>
<!-- Menú -->
<br>

<div class="container p-3">
<form action="" method="post">
    <input type="hidden" name="id_cliente" value="<?php echo $consultar->id_cliente?>">
    <input type="hidden" name="estado" value="pendiente">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="" class="form-label fw-bold">Nombre:</label>
            <input type="text" name="nombre_cliente" id="" class="form-control" placeholder="<?php echo $consultar->nombre_cliente;?>" aria-describedby="helpId" <?php echo !empty($consultar->nombre_cliente)?"disabled":""; ?>>
        </div>
        <div class="col-md-4 mb-3">
            <label for="" class="form-label fw-bold">Apellido:</label>
            <input type="text" name="apellido_cliente" id="" class="form-control" placeholder="<?php echo $consultar->apellido_cliente;?>" aria-describedby="helpId" <?php echo !empty($consultar->apellido_cliente)?"disabled":""; ?>>
        </div>
        <div class="col-md-4 mb-3">
            <label for="" class="form-label fw-bold">Teléfono:</label>
            <input type="text" name="telefono" id="" class="form-control telefono" placeholder="<?php echo $consultar->codigo_telefono; echo $consultar->telefono;?>" aria-describedby="helpId" <?php echo !empty($consultar->telefono)?"disabled":""; ?>>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="form-label fw-bold">Dirección Completa:</label>
            <textarea class="form-control" name="direccion" id="" rows="1" <?php echo !empty($consultar->direccion)?"disabled":""; ?>><?php echo $consultar->direccion;?></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label for="" class="form-label fw-bold">Comprobante:</label>
            <input type="text" name="comprobante" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
    </div>
    
    <div class="row">
        <table class="table table-hover table-bordered table-inverse table-responsive">
            <thead class="thead-inverse|thead-default">
                <tr>
                    <th>Artículos</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($carrito as $carrito) { $total += $carrito->precio_venta;  $num = 1; ?>
                    <tr id="carrito_pedido<?php echo $carrito->id_articulos ?>">
                        <td name="nombre_articulo"><?php echo $carrito->nombre_articulo ?></td>
                        <td width="50">
                            <input type="number" name="cantidad_pedido" id="cantidad-pedido" class="form-control cantidad_pedido" value=""  data-number="<?php echo $num ?>" data-value="<?php echo $carrito->precio_venta ?>">
                        </td>
                        <td name="precio_venta_pedido" class="precio_venta_pedido" id="precio-venta-pedido"><?php echo $carrito->precio_venta ?></td>
                        <td name="subtotal_pedido" class="subtotal_pedido" id="subtotal-pedido"><?php echo $carrito->precio_venta ?></td>
                        <td>
                            <a name="quitar_carrito" id="<?php echo $carrito->id_articulos ?>" class="btn btn-secondary quitar_carrito" title="Quitar del carrito"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
        </table>
        <div class="col-md-6 mb-3">
            <label for="" class="form-label fw-bold">Forma de pago:</label>
            <select class="form-control forma_de_pago" name="forma_de_pago" id="">
            <option>Seleccionar</option>
            <?php foreach($formaDePago as $formaDePago) { ?>
            <option value="<?php echo $formaDePago->id_forma_de_pago; ?>"><?php echo $formaDePago->forma_de_pago; ?></option>
            <?php } ?>
            </select>

            <div class="form-group hidden capture">
                <label for="imagen" class="form-label mt-2 fw-bold">Añadir Capture: </label>
                <img class="img-thumbnail rounded" id="img" src="<?php echo $imagen;?>" width="100" alt="">
                <input type="file" class="form-control mb-2" id="imagen" name="imagen" placeholder="Añadir archivo">
            </div>
        </div>
        <div class="col-md-6 mb-3 derecha">
            <label for="" class="form-label">Total:
                <h5 class="text-success"> 
                <?php echo number_format($total, 2) ?>
                </h5>
            </label>
            <!-- <input type="text" name="total" id="" class="form-control" placeholder="<?php echo number_format($total, 2) ?>" aria-describedby="helpId" <?php echo (isset($subtotal))?"disabled":""; ?>> -->
        </div>        
    </div>
    <div class="derecha">
        <a href="?url=pedidos" name="generar_pedido" class="btn btn-success " >Generar pedido</a>
    </div>
</form>
</div>

<!-- ********************************* -->

<?php $bottom->Bottom(); ?>
</body>
<br><br>
<footer>
<?php $footer->Footer(); ?>
</footer>
</html>