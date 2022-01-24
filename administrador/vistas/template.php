<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://bootswatch.com/5/quartz/bootstrap.min.css">   -->

  </head>
  <body>

    <nav class="navbar navbar-expand navbar-dark bg-primary">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Sistema <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="?controlador=admin&accion=inicio">Home</a>
            <a class="nav-item nav-link" href="?controlador=articulos&accion=consultarArticulos">Articulos</a>

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
                <a class="dropdown-item" href="#">Stock Mínimo / Máximo</a>
                <a class="dropdown-item" href="#">Promociones</a>
                <a class="dropdown-item" href="#">Categorá más vendida</a>
              </div>
            </div>

            <a class="nav-item nav-link" href="?controlador=pedidos&accion=inicio">Pedidos</a>
            <a class="nav-item nav-link" href="?controlador=facturas&accion=inicio">Facturas</a>
            <a class="nav-item nav-link" href="?controlador=usuarios&accion=inicio">Usuarios</a>

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
            <a class="nav-item nav-link" href="?controlador=logout&accion=cerrar">Cerrar Sesión</a>
            <?php } ?>
        </div>
    </nav>

    <!-- Contenedor por defecto: bs5-grid-default  -->
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col-12">
                <?php include_once("ruteador.php"); ?>
            </div>
            
        </div>
    <!-- </div> -->
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function(){ 
          // Porner r en seleccionar  
          $('.selecciona').click(function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            var id_articulos=$('#id_articulos'+id).text();
            var codigo_articulo=$('#codigo_articulo'+id).text();
            var nombre_articulo=$('#nombre_articulo'+id).text();
            var descripcion=$('#descripcion'+id).text();
            var precio_venta=$('#precio_venta'+id).text();
            var cantidad=$('#cantidad'+id).text();
            var estado=$('#estado'+id).text();
            var categoria=$('#categoria'+id).text();
            var descuento=$('#descuento'+id).text();
          
            $('#edit').modal('show');
            $('#eid_articulos').val(id_articulos);
            $('#ecodigo_articulo').val(codigo_articulo);
            $('#enombre_articulo').val(nombre_articulo);
            $('#edescripcion').val(descripcion);
            $('#eprecio_venta').val(precio_venta);
            $('#ecantidad').val(cantidad);
            $('#eestado').val(estado);
            $('#ecategoria').val(categoria);
            $('#edescuento').val(descuento);
          });
        });
    </script>
  </body>
</html>
