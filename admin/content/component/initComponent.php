<nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#">Sistema <span class="visually-hidden">(current)</span></a>
        <a class="nav-item nav-link" href="?url=admin">Home</a>

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Almacen
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="?url=consultarArticulos">Artículos</a>
                <a class="dropdown-item" href="?url=crearCategoria">Categorías</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Proveedores
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="?url=registrarProveedor">Agregar</a>
                <a class="dropdown-item" href="?url=consultarProveedor">Consultar</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Facturación
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="?url=ventas">Ventas</a>
            </div>
        </div>

        <a class="nav-item nav-link" href="?url=pedidos">Pedidos</a>

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Reportes
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <h6 class="dropdown-header">Pedidos</h6>
                <a class="dropdown-item" href="#">Reportes de pedidos</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Facturas</h6>
                <a class="dropdown-item" href="#">Reportes de facturas</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Artículos</h6>
                <a class="dropdown-item" href="#">Artículos más vendidos</a>
                <a class="dropdown-item" href="#">Stock Mínimo</a>
                <a class="dropdown-item" href="#">Stock Máximo</a>
                <a class="dropdown-item" href="#">Promociones</a>
                <a class="dropdown-item" href="#">Categoría más vendida</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Mantenimiento
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <h6 class="dropdown-header">Bitacoras</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    Bitacora administradores
                </a>
                <a class="dropdown-item" href="#">
                    Bitacora Clientes
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Backup</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    Respaldar
                </a>
                <a class="dropdown-item" href="#">
                    Restaurar
                </a>
            </div>              
        </div>
        <?php if (isset($nombreAdmin)) { ?>
        <a class="nav-item nav-link" href="?url=logout">Cerrar Sesión</a>
        <?php } ?>
    </div>
</nav>