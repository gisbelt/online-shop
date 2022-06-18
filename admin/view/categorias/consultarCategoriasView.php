<div class="row m-0 center">
    <div class="col-md-4 col-sm-12 col-xs-12">
        <h3 class="text-center mb-2">Listado de Categorias</h3>
        <div class="mb-3">
            <form action="" method="post">
            <input type="text" name="" id="" class="form-control" placeholder="Buscar categoria" aria-describedby="helpId">
            </form>
        </div>     
    </div>    
</div>

<div class="container">
    <div class="row center">
        <div class="col-md-4">
            <!-- b4-table-default -->
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($categoria as $cat) { ?> 
                    <tr id="categoria<?php echo $cat->id_categoria; ?>" class="">
                        <td width="10" id="categoria2" name="categoria2"><?php echo $cat->categoria; ?></td>
                        <td width="10">
                            <form method="POST">                            
                                <input type="hidden" name="id_categoria" id="id_categoria" value="<?php echo $cat->id_categoria; ?>">
                                <button type="submit" name="accion" id="seleccionar" class="btn btn-info seleccionar" value="seleccionar">
                                    <i class="bi bi-pencil text-light"></i>
                                </button>
                                <a name="borrar" id="<?php echo $cat->id_categoria ?>" class="btn btn-secondary mt-1 borrar_categoria">
                                    <i class="bi bi-trash text-light"></i>
                                </a>
                            </form>
                        </td>
                    </tr>             
                    
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>