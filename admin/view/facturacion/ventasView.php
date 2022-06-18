<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <?php $head->Heading(); ?>
</head>
<body>
<!-- Menú -->
<?php require_once "content/component/initComponent.php"; ?>
<!-- Menú -->

<div class="container">
    <div class="row m-0">
        <div class="col-md-12">
            <div class="mb-3">
                <form action="" method="post">
                <label for="" class="form-label"></label>
                <input type="text" name="input_venta" id="<?php echo $buscar->nombre_articulo ?>" class="form-control input_venta" placeholder="Buscar producto" aria-describedby="helpId">
                <i class="bi bi-search input_venta_icon"></i>
                </form>
            </div>        
        </div>
        <div id="suggestions"></div>
        
    </div>
</div>

<div class="row m-0">
   
    <!-- NO ESTÁ LISTO  -->
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-body flex-row space-between">
                <h5 class="card-title title">Nombre</h5>
                <h5 class="card-title title">Precio</h5>
                <h5 class="card-title title">Estado</h5>
                <h5 class="card-title title">Cantidad</h5>
                <h5 class="card-title title">Acción</h5>
            </div>
            <ul class="list-group list-group-flush flex-row space-between">
                <li class="list-group-item nombre_articulo"></li>
                <li class="list-group-item"></li>
                <li class="list-group-item"></li>
                <li class="list-group-item">
                    <a href="" class="btn btn-danger">
                        <i class="bi bi-plus"></i>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="" class="btn btn-secondary">
                        <i class="bi bi-trash"></i>
                    </a>
                </li>
            </ul>
            <div class="derecha p-3">
                <a href="http://" class="btn btn-success">Generar pedido</a>
            </div>
        </div>
    </div>
</div>

<!-- ********************************* -->
<?php $bottom->Bottom(); ?>
</body>
<br><br>
</html>