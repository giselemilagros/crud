<?php

require 'conexion.php';

$_bandera = true;


// levanto los datos del articulo


$art_img =$_FILES['user_img']['name'];
// $_FILES['user_img']['name'];

$denom_art =$_POST['denominacion'];
$precio_art=$_POST['precio'];
$cat_art = $_POST['categoria'];
$descripcion_art=$_POST['descripcion'];
$stock =$_POST['stock'];

$art_img_valida = trim($art_img);
$denom_art_valida = trim($denom_art);
$precio_art_valida = trim($precio_art);
$cat_art_valida = trim($cat_art);
$descripcion_art_valida = trim($descripcion_art);
$stock_valida = trim($stock);

if (empty($art_img_valida)){
    $_bandera = false ; 
    header("Location: abm_articulos.php?errimg");
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
if (empty($stock_valida)){
    $_bandera = false ; 
    header("Location: abm_articulos.php?errstock");
}

$precio_art= (float) $precio_art;
$cat_art_valida = (int) $cat_art_valida;
$directorio = 'img/';
$directorio = $directorio.basename( $_FILES['user_img']['name']);


// inserto los registros en la base de datos 

if ($_bandera){
    $insertar = "INSERT INTO articulos (cod_articulo,denom_articulo,vigente,cod_categoria,foto_articulo,descripcion,precio_unitario,stock)
    VALUES (null,'$denom_art_valida','S',$cat_art_valida,'$directorio','$descripcion_art_valida',$precio_art,$stock)";

    $insert=mysqli_query($conectar, $insertar);

   if($insert){
       
       move_uploaded_file($_FILES['user_img']['tmp_name'],$directorio);    

       header("Location: abm_articulos.php?grab");
       
   }
   else{
    header("Location: abm_articulos.php?err");
   }
} 


?>