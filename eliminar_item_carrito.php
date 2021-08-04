
<?php
 require 'conexion.php';

 $_bandera = true;
 
 
 // levanto los datos del articulo
 
 $nro_carrito = $_GET['nro_carrito'];
 $cod_articulo = $_GET['cod_articulo'];

 // elimino el registro del carrito 
  if( empty($nro_carrito)){
    header("Location: carrito.php?nro_carrito=$nro_carrito&err_nro_carrito"); 
  }
  if( empty($cod_articulo)){
    header("Location: carrito.php?nro_carrito=$nro_carrito&err_cod_articulo"); 
  }

  $sql = "DELETE FROM carrito_temporal where nro_carrito =$nro_carrito and cod_articulo =$cod_articulo";
 
  $sql_conexion = mysqli_query($conectar,$sql);

  

  if ($sql_conexion){
      // se borro bien el registro, hay que ir al carrito nuevamente y pasarle el dato del nro_carrito 
      header("Location: carrito.php?nro_carrito=$nro_carrito"); 

  }
  else {
    header("Location: carrito.php?nro_carrito=$nro_carrito&err_grabacion");  
  }

?>