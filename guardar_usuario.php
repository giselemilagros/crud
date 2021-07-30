<?php

require 'conexion.php';
session_start();
$_bandera = true;

//echo 'Aqui es el Dump de post <br>';
//var_dump($_POST);
//echo 'termina el Dump <br>';

$mail = $_POST['mail'];
$password =$_POST['password'];
$nombre_completo = $_POST['usuario'];
$direccion=$_POST['direccion'];
$provincia=$_POST['provincia'];
$ciudad=$_POST['ciudad'];
$codigo_postal = $_POST['codigo_postal'];
$dni = $_POST['dni'];



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
    $insertar = "INSERT INTO usuarios (cod_usuario,nombre_completo,dni,mail,password,direccion_completa,cod_provincia,ciudad,cod_postal)
    VALUES (null,'$nombre_completo',$dni,'$mail','$password','$direccion','$provincia','$ciudad','$codigo_postal')";

    $insert=mysqli_query($conectar, $insertar);

   if($insert){
       // $nombre_completo = str_replace(' ' ,'&spc&',$nombre_completo);
        $_SESSION['usuario'] = $nombre_completo;
        $_SESSION['dni']=$dni;
        $_SESSION['mail'] =$mail;
        //$direccion = str_replace(' ','&spc&',$direccion);
        $_SESSION['direccion']= $direccion;
        $_SESSION['cod_provincia'] = $provincia;
        //$ciudad = str_replace(' ' ,'&spc&',$ciudad);
        $_SESSION['ciudad']=$ciudad;
        $_SESSION['cod_postal']=$codigo_postal;
       
        $_SESSION['password']=$password;
       // var_dump(mysql_insert_id());
        // tengo que levantar el ultimo codigo de usuario de la tabla para guardar en usuario 
        // levanto el ultimo usuario grabado con max y luego lo meto en la sesion 

        $sql = "SELECT max( cod_usuario) as max FROM `usuarios`";
       
      
        $qseleccion = mysqli_query($conectar, $sql);

        if($qseleccion){
            $cod_usuario_max=  mysqli_fetch_array($qseleccion);
            $cod_usuario = $cod_usuario_max["max"] ;
            $cod_usuario_int = (int) $cod_usuario;
           
            $_SESSION['coduser'] = $cod_usuario_int ;
        }
        else {
            header("Location: registrate_comp.php?err");
        }
       
       
    

      
    
        // si es administrador que abra otro index que tiene mas opciones en el navbar
        if  ($_SESSION['usuario'] =="ADMINISTRADOR"){
        
            header("location: index_admin.php ");
        }else{
            header("location: index.php ");
        }
   
    
    }else {
    //  $error = mysqli_error($insert) ; 
    
    header("Location: registrate_comp.php?err");
    }   
}


?>