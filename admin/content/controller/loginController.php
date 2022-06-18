<?php 
namespace content\controller;

use content\component\headElement as headElement;
use content\component\bottomComponent as bottomComponent;

use content\models\adminModel as admin;

$head = new headElement();
$bottom = new bottomComponent();

if(isset($_POST['login'])){
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];
    if($correo=="" || $contrasenia==""){
        $mensaje1="Por favor debe ingresar los datos";
    }
    else{
        //ejecutamos
        $consultarAdmin=admin::login($correo); 
        if($consultarAdmin['contrasenia']==$contrasenia && $consultarAdmin['correo']==$correo){
            $_SESSION['correo']='ok';
            $_SESSION['correoAdmin']=$consultarAdmin->correo;
            $_SESSION['nombreAdmin']=$consultarAdmin->nombre;
            $_SESSION['date']=date('d_m_Y_H_i');
            $_SESSION['ip']=$_SERVER['REMOTE_ADDR'];
            header("location:?url=admin");  
        }else{
            $mensaje2="Error, el correo o contraseña son incorrectos";
        }    
    }  
}

include_once("view/admin/loginView.php");   

?>