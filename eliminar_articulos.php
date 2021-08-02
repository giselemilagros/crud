<?php

require 'conexion.php';
$_bandera = true;

$cod_articulo_get = (int) $_GET['cod_articulo']; // viene por link 



    // inserto los registros en la base de datos 

    if ($_bandera){
        // YO NO HAGO DELETE A LA BASE, LE PONGO VIGENTE = 'N'. y esos articulos no vienen al listado para seleccionarlos
        $update = "UPDATE articulos SET vigente ='N' where cod_articulo ='$cod_articulo_get' ";
      

        $actualizo=mysqli_query($conectar, $update);

        if($actualizo){
            

            header("Location: lista_articulos.php?grab"); 
            
            
        }
        else{
            header("Location: lista_articulos.php?err");
        }
    } 

?>