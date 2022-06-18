<?php
if($_SESSION['correo_cliente']=='ok'){
    $nombreCliente=$_SESSION['nombreCliente'];
}
?>
<nav class="navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand d-md-none d-inline" href="">Brand</a>
    <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="nav-link" href="#"><i class="bi bi-search mr-1"></i></a>
    
    <div class="nav navbar-collapse collapse navbar-nav justify-content-md-center">
        <!-- <a class="nav-item nav-link active" href="#">Sistema <span class="visually-hidden">(current)</span></a> -->
        <a class="nav-item nav-link active" href="?url=home">Home</a>
        <a class="nav-item nav-link" href="?controlador=empleados&accion=inicio">Nosotros</a>
        <a class="nav-item nav-link" href="?url=tienda">Tienda</a>
        <a class="nav-item nav-link" href="?controlador=empleados&accion=inicio">Contacto</a>
        <?php if(!isset($nombreCliente)){ ?>
        <a class="nav-item nav-link" href="?url=registrarse">Registrarse</a>
        <a class="nav-item nav-link" href="?url=login">Iniciar Sesión</a>
        <?php } ?>        
    </div>    
    <div class="nav navbar-nav justify-content-start flex-nowrap">
        <li class="nav-item">
            <?php if(isset($nombreCliente)){ ?>
            <div class="dropdown ">
                <button class="btn btn-light dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Hola <?php echo $nombreCliente;?>
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="?url=perfil">Cuenta <i class="bi bi-person text-success"></i> </a>
                    <a class="dropdown-item" href="?url=pedidos">Pedidos</a>
                    <a class="dropdown-item" href="?url=logout">Cerrar Sesión</a> 
                </div>
            </div>
            <?php } ?>
        </li>
        <a class="nav-item nav-link" href="?url=ver_carrito" style="margin-right: 10px;" title="Ver carrito">
            <strong style="color: rgb(226, 83, 83);" class="conteoCarrito">
                <?php if ($conteo > 0) { printf("(%d)", $conteo); } ?>
            </strong>
            <i class="bi bi-cart2 text-success"></i>
        </a> 
    </div>    
</nav>