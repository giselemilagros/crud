<?php

require 'conexion.php';
$_bandera = true;

$cod_articulo_get = (int) $_GET['cod_articulo']; // viene por link 


// levanto los datos del articulo


$art_img =$_FILES['user_img']['name'];
// $_FILES['user_img']['name'];

$denom_art =$_POST['denominacion'];
$precio_art=$_POST['precio'];
$cat_art = $_POST['categoria'];
$descripcion_art=$_POST['descripcion'];
$stock =$_POST['stock'];
$vigente =$_POST['vigente'];

$art_img_valida = trim($art_img);
$denom_art_valida = trim($denom_art);
$precio_art_valida = trim($precio_art);
$cat_art_valida = trim($cat_art);
$descripcion_art_valida = trim($descripcion_art);
$stock_valida = trim($stock);
$vigente_valida = trim($vigente);

if (empty($art_img_valida)){
    // si la imagen esta vacia la lenvanto de la imagen que tenia el articulo
    $art_img =$_GET['foto_articulo'];
    $directorio =  $art_img ;
   
   
}
else{
    $directorio = 'img/';
    $directorio = $directorio.basename( $_FILES['user_img']['name']);
}
if (empty($denom_art_valida)){
    $_bandera = false ; 
    header("Location: modifica_articulos.php?errdenom");
}
if (empty($precio_art_valida)){
    $_bandera = false ; 
    header("Location: modifica_articulos.php?errpre");
}
if (empty($cat_art_valida)){
    $_bandera = false ; 
    header("Location: modifica_articulos.php?errcat");
}
if (empty($descripcion_art_valida)){
    $_bandera = false ; 
    header("Location: modifica_articulos.php?errdescrip");
}
if (empty($stock_valida)){
    $_bandera = false ; 
    header("Location: modifca_articulos.php?errstock");
}
if (empty($vigente_valida)){
    $_bandera = false ; 
    header("Location: modifca_articulos.php?errvigente");
}

    $precio_art= (float) $precio_art;
    $cat_art_valida = (int) $cat_art_valida;
    


    // inserto los registros en la base de datos 

    if ($_bandera){
        $update = "UPDATE articulos SET denom_articulo ='$denom_art',cod_categoria=$cat_art,foto_articulo='$directorio',descripcion='$descripcion_art',precio_unitario=$precio_art,stock=$stock, vigente='$vigente'  where cod_articulo =$cod_articulo_get ";
       

        $actualizo=mysqli_query($conectar, $update);

        if($actualizo){
            //sube la foto al directorio unicamente si la foto es nueva, sino no vuelvo a subirla 

            if (!empty($art_img_valida)){
                move_uploaded_file($_FILES['user_img']['tmp_name'],$directorio);    
            }

            header("Location: lista_articulos.php?grab"); 
            
            
        }
        else{
            header("Location: lista_articulos.php?err");
        }
    } 

?>