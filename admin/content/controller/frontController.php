<?php
namespace content\controller;

use config\settings\sysConfig;

class frontController extends sysconfig{

    public $request = "url";
    private $url; 

    public function  __construct($request){
        if(isset($request["url"])){
            $this->url=$request["url"];
            $this->validarURL();
        }
        else{
            die("<script>location='?url=login'</script>");
        }
    }

    private function validarURL(){
        $url = preg_match_all("/^[a-zA-Z0-9-@\/.=:_#$ ]{1,700}$/",$this->url);
        if($url == 1){
            $this->Cargar_Pagina($this->url); /* llamdo de la funcion que cargara las vistas */
        }else{
            die('LA URL INGRESADA ES INVÁLIDA');
        }
    }

    private function Cargar_Pagina($url){
        /* verificacion si el archivo existe , en la direccion predeterminada */
        if(file_exists("content/controller/".$url."controller.php")){
            /* si existe trae el archivo solicitado mediante el require_once */
            require_once("content/controller/".$url."controller.php"); 
        }else{
            /* si no existe redireccionaremos a la pagina de error */
            die("<script>location='?url=error'</script>");
        }	
    }  
}
?>