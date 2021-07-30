<?php

require 'conexion.php';
session_start();
$_bandera = true;

//echo 'Aqui es el Dump de post <br>';
//var_dump($_POST);
//echo 'termina el Dump <br>';

$mail_nuevo = $_POST['mail'];
$password =$_POST['password'];
$nombre_completo = $_POST['usuario'];
$direccion=$_POST['direccion'];
$provincia=$_POST['provincia'];
$ciudad=$_POST['ciudad'];
$codigo_postal = $_POST['codigo_postal'];
$dni = $_POST['dni'];
// datos originales del usuario 
$pass = $_SESSION['password'];
$mail =$_SESSION['mail'];
$cod_usuario =$_SESSION['cod_usuario'];



// aca faltan validar todos los datos, no deben estar vacios y en caso de estar vacios o no corresponder devolver error en 
// la pagina registrate_comp.php?error y cada error
// verifico que cada dato este completo
$mail_valida = trim($mail);
$password_valida = trim($password);
$nombre_valida = trim($nombre_completo);
$direccion_valida = trim($direccion);
$provincia_valida = trim($provincia);
$ciudad_valida = trim($ciudad);
$codigo_postal_valida = trim($codigo_postal);
$dni_valida = trim($dni);

if (empty($password_valida)){
    $_bandera = false ; 
    header("Location: registrate_comp.php?errpass");
}
if (empty($nombre_valida)){
    $_bandera = false ; 
    header("Location: registrate_comp.php?erruser");
}
if (empty($direccion_valida)){
    $_bandera = false ; 
    header("Location: registrate_comp.php?errdirec");
}
if (empty($provincia_valida)){
    $_bandera = false ; 
    header("Location: registrate_comp.php?errprov");
}
if (empty($ciudad_valida)){
    $_bandera = false ; 
    header("Location: registrate_comp.php?errciu");
}
if (empty($codigo_postal_valida)){
    $_bandera = false ; 
    header("Location: registrate_comp.php?errcp");
}
if (empty($dni_valida)){
    $_bandera = false ; 
    header("Location: registrate_comp.php?errdni");
}

if ($_bandera){
    // primero hago un select para obtener el codigo de usuario 
    
    $actualizar = "UPDATE  usuarios SET nombre_completo='$nombre_completo' , dni =$dni , mail ='$mail_nuevo',password ='$password', direccion_completa='$direccion',cod_provincia='$provincia', ciudad='$ciudad' , cod_postal='$codigo_postal' WHERE cod_usuario =$cod_usuario";

 

    $actualizo=mysqli_query($conectar, $actualizar);

   if($actualizo){
      if (strlen($nombre_completo) > 15){
        // corto el string a 15 caracteres
      }
        $_SESSION['usuario'] = $nombre_completo;
        $_SESSION['dni']=$dni;
        $_SESSION['mail'] =$mail_nuevo;
        $_SESSION['direccion']= $direccion;
        $_SESSION['cod_provincia'] = $provincia;
        $_SESSION['ciudad']=$ciudad;
        $_SESSION['cod_postal']=$codigo_postal;
        $_SESSION['cod_usuario'] =$cod_usuario;
        $_SESSION['password']=$password;
    
        // si es administrador que abra otro index que tiene mas opciones en el navbar
        if  ($_SESSION['usuario'] =="ADMINISTRADOR"){
        
            header("location: index_admin.php ");
        }else{
            header("location: index.php ");
        }
   
    
    }else {
    //  $error = mysqli_error($insert) ; 
    
    header("Location: modificar_datos_usuario.php?err");
    }   
}


?>