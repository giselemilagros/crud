<?php

require 'conexion.php';
session_start();




$mail = $_POST['mail'];
$pass = $_POST['password'];


$query =  "SELECT COUNT(*) as contar FROM usuarios WHERE mail = '$mail' AND password = '$pass'";
$consulta =  mysqli_query($conectar,$query);
$resultado = mysqli_fetch_array($consulta);

if ($resultado['contar'] > 0){
    $query_datos_user= "SELECT * FROM usuarios WHERE mail = '$mail' AND password = '$pass'";
    $consulta_datos_user =  mysqli_query($conectar,$query_datos_user);
    $resultado_datos_user =  mysqli_fetch_array($consulta_datos_user);

    //************************************* */ VALIDACION DATOS DE LA BASE************************************************* 
    if (empty($resultado_datos_user['nombre_completo'])){
        $nombre_user_completo = "Nombre NO indicado" ; 
    }else{
        $nombre_user_completo = $resultado_datos_user['nombre_completo'];
    }
   
    
    if (empty($resultado_datos_user['direccion_completa'])){
        $direccion_user="Dirección no Indicada" ; 
    }else{
        $direccion_user =$resultado_datos_user['direccion_completa'];
    }

    if (empty($resultado_datos_user['cod_provincia'])){
        $cod_provincia="Provincia no Indicada" ; 
    }else{
        $cod_provincia= $resultado_datos_user['cod_provincia'];
    }

    if (empty($resultado_datos_user['ciudad'])){
        $ciudad="Ciudad no Indicada" ; 
    }else{
        $ciudad= $resultado_datos_user['ciudad'];
    }

    if (empty($resultado_datos_user['cod_postal'])){
        $cod_postal="Codigo Postal no Indicado" ; 
    }else{
        $cod_postal= $resultado_datos_user['cod_postal'];
    }

  
    //********************************* */ COMPLETAMOS VARIABLES DE SESION************************************************** 
    $_SESSION['usuario'] = $nombre_user_completo;
    $_SESSION['dni']=$DNI;
    $_SESSION['mail'] =$mail;
    $_SESSION['direccion']= $direccion_user;
    $_SESSION['cod_provincia'] = $cod_provincia;
    $_SESSION['ciudad']=$ciudad;
    $_SESSION['cod_postal']=$cod_postal;
    $_SESSION['password']=$pass;
    $_SESSION['coduser'] =$resultado_datos_user['cod_usuario'];
    
    // si es administrador que abra otro index que tiene mas opciones en el navbar
    if  ($_SESSION['usuario'] =="ADMINISTRADOR"){
       
        header("location: index_admin.php ");
    }else{
        header("location: index.php ");
    }
    
}else{
    header("Location: inicio_sesion_comp.php?err");
}

?>




