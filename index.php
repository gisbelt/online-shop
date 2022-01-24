<?php
//Designados por defectos
$controlador="paginas";
$accion="inicio";

// Haremos más dinámico el acceso a diferentes páginas por medio dela url
if(isset($_GET['controlador']) && isset($_GET['accion']) ){

    if( ($_GET['controlador']!="") && ($_GET['accion']!="") ){
        // Si hubo algo y no está vacío lo validamos y lo asignamos
        //Y si son diferentes a los asignados por defecto arriba, cambialos
        $controlador=$_GET['controlador'];
        $accion=$_GET['accion'];

        // print_r($_GET);
        // URL para ver si se imprimen los valores
        // http://localhost/crud-mvc-php-mysql-2021/?controlador=paginas&accion=inicio

        // Estas url nos van a servir para acceder a la clase y a los métodos
    }  

}

require_once("vistas/template.php");
?>