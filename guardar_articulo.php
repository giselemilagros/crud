<?php

require 'conexion.php';
session_start();
$_bandera = true;


// levanto los datos del articulo

$art_img =  $_FILES['art_img']['name'];
$codigo_art =$_POST['codigo'];
$denom_art =$_POST['denominacion'];
$precio_art=$_POST['precio'];
$cat_art = $_POST['categoria'];
$descripcion_art=$_POST['descripcion'];





// aca faltan validar todos los datos, no deben estar vacios y en caso de estar vacios o no corresponder devolver error en 
// la pagina registrate_comp.php?error y cada error
// verifico que cada dato este completo
$art_img_valida = trim($art_img);
$codigo_art_valida = trim($codigo_art);
$denom_art_valida = trim($denom_art);
$precio_art_valida = trim($precio_art);
$cat_art_valida = trim($cat_art);
$descripcion_art_valida = trim($descripcion_art);

if (empty($art_img_valida)){
    $_bandera = false ; 
    header("Location: abm_articulos.php?errimg");
}
if (empty($codigo_art_valida)){
    $_bandera = false ; 
    header("Location: abm_articulos.php?errart");
}
if (empty($denom_art_valida)){
    $_bandera = false ; 
    header("Location: abm_articulos.php?errdenom");
}
if (empty($precio_art_valida)){
    $_bandera = false ; 
    header("Location: abm_articulos.php?errpre");
}
if (empty($cat_art_valida)){
    $_bandera = false ; 
    header("Location: abm_articulos.php?errcat");
}
if (empty($descripcion_art_valida)){
    $_bandera = false ; 
    header("Location: abm_articulos.php?errdescrip");
}

$precio_art= (float) $precio_art;
?>