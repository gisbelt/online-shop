<?php
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;
use content\component\footerElement as footerElement;

use content\models\homeModel as inicio;
use content\models\clientesModel as clientes;

$head = new headElement();
$bottom = new bottomComponent();
$footer = new footerElement();

// Si hay un envio tipo post redirecciona a algún lugar
if(isset($_POST['login'])){
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];
    if($correo=="" || $contrasenia==""){
        $mensaje1="Por favor debe ingresar los datos";
    }
    else{ 
        //ejecutamos
        $consultarCliente=clientes::login($correo); 
        if($consultarCliente['contrasenia']==$contrasenia && $consultarCliente['correo_cliente']==$correo){
            $_SESSION['correo_cliente'] = "ok";
            $_SESSION['correoCliente']=$consultarCliente->correo_cliente;
            $_SESSION['nombreCliente']=$consultarCliente->nombre_cliente;
            $_SESSION['date']=date('d_m_Y_H_i');
            $_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
            header("location:?url=home");  
        }else{
            $mensaje2="Error, el correo o contraseña son incorrectos";
        }             
    }                
}

include_once("view/clientes/loginView.php");
?>