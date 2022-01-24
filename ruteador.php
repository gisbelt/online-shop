<!-- Este ruteador me va a ayudar a canalizar ciertos elementos
o a entrar directamente al controlador -->

<?php

// Este controlador y accion es el que estamos obteniendo por la url, la recibimos en index.php
// echo $controlador; // Este nombre es el que va despúes del _ en cada controlador
// echo $accion;
// Concatenamos la url
include_once("controladores/controlador_".$controlador.".php");
// Aquí vamos a armar el nombre de nuestra clase que vamos a instanciar, que sería la que está abajo al final 
// ucfirst es porque Paginas empieza con p mayúscula
$objControlador="controlador".ucfirst($controlador);
$controlador=new $objControlador(); //Creamos la instancia del controlador
$controlador->$accion(); //accedemos al método, lo que se pida en la url es lo que se va a respetar para mostrarse, puede ser inicio, error, etc
// http://localhost/crud-mvc-php-mysql-2021/?controlador=paginas&accion=inicio




// Este es un objeto para porder entrar a la accion que queremos ejecutar
// $controlador=new controladorPaginas(); //Creamos la instancia del controlador
// $controlador->inicio(); //accedemos al método

?>