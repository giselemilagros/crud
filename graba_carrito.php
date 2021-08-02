<?php

require 'conexion.php';
session_start();
$_bandera = true;


// funciones 

function ConsultaStockArt ($cod_articulo){
    $sql_stock = "SELECT * FROM ARTICULOS WHERE cod_articulo = $cod_articulo" ; 
    $conecta_sql_art = mysqli_query($conectar, $sql_stock);
   
    if ($conecta_sql_art){
        $datos_articulo = mysqli_fetch_array($conecta_sql_art);
    }
    else{
        header("Location: muestra_categorias.php?errdatosart");
    }
    $stock_funcion = (int) $datos_articulo['stock'];

    return  $stock_funcion;
}

function DevuelveNroCarrito($sesion_id){
    $query_nro_pedido ="SELECT *  FROM  temporal_sesiones_carrito WHERE id_sesion= '$sesion_id' ";
    $conecta_query=mysqli_query($conectar, $query_nro_pedido);

    if ($conecta_query){
        $resultado_nro_pedido = mysqli_fetch_array($conecta_query);
    }
    else{
        header("Location: muestra_categorias.php?errnrocarrito");
    }

  

   return $nro_carrito_funcion = $resultado_nro_pedido['nro_carrito'];
}
function CantidaddeArtenCarrito($cod_art){
    
    $sql_cant_art ="SELECT sum(cantidad) as cant_articulo FROM carrito_temporal where cod_articulo =$cod_art";
    $conecta_sql_cant_art =mysqli_query($conectar,  $sql_cant_art); 
    

    if ($conecta_sql_cant_art){
        $cant_articulo =  mysqli_fetch_array($conecta_sql_cant_art);

    }else{
        header("Location: muestra_categorias.php?errCantCarrito"); 
    }

    // si es null entonces 0
    if(is_null($cant_articulo['cant_articulo'])){
        $suma_reservada_articulo_funcion = 0 ; 

    }else {
       $suma_reservada_articulo_funcion =$cant_articulo['cant_articulo'] ; 
    }
    return $suma_reservada_articulo_funcion ; 
}
function InsertaEnCarrito($nro_carr,$cod_art,$cant,$tamanioart){
     // levanto los datos del articulo para insertarlos 
     $insert_carrito = "INSERT INTO carrito_temporal (nro_carrito,cod_articulo,tamanio_articulo,cantidad) VALUES ($nro_carr,$cod_art,$tamanioart,$cant)";
           
     $conecta_insert_carrito = mysqli_query($conectar,  $insert_carrito); 
     // si inserto 
     if($conecta_insert_carrito){
         header("Location: carrito.php?nro_carrito=$nro_carr");
     }else{ //si no inserto 
         header("Location: muestra_Categorias.php?errNoInsertoCarrito1");
     }
}
function  YaExisteArt($nro_carr,$cod_art){
    $sqlArt ="SELECT count(*) as contar_art FROM carrito_temporal WHERE nro_pedido= $nro_carr and cod_articulo =$cod_art ";
    $consulta_existe_Art=mysqli_query($conectar, $sqlArt);

    $resultado_existencia = mysqli_fetch_array($consulta_existe_Art);
    if($resultado_existencia['contar_art'] == 1){
        $existe_en_carrito ="S";
    }else{
        $existe_en_carrito ="N";
    }
    return $existe_en_carrito ;
}

function UpdateEnCarrito($nro_carr,$cod_art){
    // primero levanto la cantidad que hay de ese art en la  base y luego le sumo 1 
    $sql_select = "SELECT * FROM carrito_temporal WHERE nro_pedido= $nro_carr and cod_articulo =$cod_art";
    $consulta_sql_select = mysqli_query($conectar,$sql_select);
    $resultado_sql_select = mysqli_fetch_array($consulta_sql_select);

    $cantidad_art =  $resultado_sql_select['cantidad'];
    $cantidad_art = $cantidad_art + 1;

    $sql_update = "UPDATE INTO carrito_temporal set cantidad = $cantidad_art where nro_pedido= $nro_carr and cod_articulo =$cod_art " ;
    $conecta_sql_update = mysqli_query($conectar, $sql_update) ;
    if ($conecta_sql_update){
        header("Location: carrito.php?nro_carrito=$nro_carr");
    }else {
        header("Location: muestra_Categorias.php?errUpdatecarrito1");
    }

}

function ProximoNroCarrito(){
    
    $mayor_nro_carrito ="SELECT max(nro_carrito) as max FROM `temporal_sesiones_carrito`";
    $ejecutar_mayor=mysqli_query($conectar, $mayor_nro_carrito);

    $resultado = mysqli_fetch_array($ejecutar_mayor);
    if ($resultado){
        if (is_null($resultado['max'])){
            $nro_carrito = 1;
    
        }else{
            $nro_carrito = $resultado['max'] + 1;
        }

    }else {
        header("Location: muestra_Categorias.php?errselectNroCarrito");
    }
    return $nro_carrito ; 
}



// voy a  buscar si ya existe el session_id() en la tabla entonces tengo que agregar un item al carrito, sino es la primera vez
// al confirmar el carrito se va a borrar esta session de esta tabla temporal.

$id_sesion = session_id();

// busco si ya existe en caso de no existir lo inserto y luego creo un nuevo nro de carrito para esta sesion.

$query ="SELECT count(*) as contar FROM temporal_sesiones_carrito WHERE id_sesion= '$id_sesion' ";
$consulta=mysqli_query($conectar, $query);

$resultado = mysqli_fetch_array($consulta);

// si encontro un item que coincide entonces quiere decir que la sesion ya existe y solo debo insert un registro en la tabla 
// carrito_temporal
if ($resultado['contar'] == 1){

    // si ya existe la sesion entonces levanto el nro de carrito e inserto con ese nro de carrito en el detalle temporal
   // $nro_carrito = DevuelveNroCarrito($id_sesion) ;
   $query_nro_pedido ="SELECT *  FROM  temporal_sesiones_carrito WHERE id_sesion= '$id_sesion' ";
   $conecta_query=mysqli_query($conectar, $query_nro_pedido);

   if ($conecta_query){
       $resultado_nro_pedido = mysqli_fetch_array($conecta_query);
   }
   else{
       header("Location: muestra_categorias.php?errnrocarrito");
   }
   $nro_carrito = $resultado_nro_pedido['nro_carrito'];

    // levanto el articulo que viene por link 
    $cod_articulo = (int) $_GET['cod_articulo'];
    //vamos a buscar que stock este articulo tiene asignado 
    $sql_stock = "SELECT * FROM ARTICULOS WHERE cod_articulo = $cod_articulo" ; 
    $conecta_sql_art = mysqli_query($conectar, $sql_stock);
   
    if ($conecta_sql_art){
        $datos_articulo = mysqli_fetch_array($conecta_sql_art);
    }
    else{
        header("Location: muestra_categorias.php?errdatosart");
    }
    $stock_tabla_articulos= (int) $datos_articulo['stock'];
   
  //  $stock_tabla_articulos = ConsultaStockArt($cod_articulo) ; 


 // ahora levanto el stock de la tabla temporal del carrito reservado no importa la sesion 
   // $cant_recervada_en_carrito = CantidaddeArtenCarrito($cod_articulo) ;

   $sql_cant_art ="SELECT sum(cantidad) as cant_articulo FROM carrito_temporal where cod_articulo =$cod_articulo";
   $conecta_sql_cant_art =mysqli_query($conectar,  $sql_cant_art); 
   

   if ($conecta_sql_cant_art){
       $cant_articulo =  mysqli_fetch_array($conecta_sql_cant_art);

   }else{
       header("Location: muestra_categorias.php?errCantCarrito"); 
   }

   // si es null entonces 0
   if(is_null($cant_articulo['cant_articulo'])){
       $suma_reservada_articulo_funcion = 0 ; 

   }else {
      $suma_reservada_articulo_funcion =$cant_articulo['cant_articulo'] ; 
   }
   $cant_reservada_en_carrito = $suma_reservada_articulo_funcion; 


    // ahora le resto la cantidad reservada en el carrito al stock del articulo, solo si el stock es mayor a 0

    if ($stock_tabla_articulos > 0){
        $stock_final = $stock_tabla_articulos - $cant_reservada_en_carrito ;

        // si el stock final es mayor a 0, entonces puedo agregar el item al carrito, en caso de que no, le digo que no hay stock 
        if ($stock_final > 0 ) {
            // como ya existe el carrito, puede ser que el articulo que estamos insertando ya exista en el detalle
            // vamos a buscar si ya existe y en caso de existir no insertamos sino que hacemos update sobre la cantidad solicitada.

           //$encontro_art_en_carrito = YaExisteArt($nro_carrito,$cod_articulo);
           $sqlArt ="SELECT count(*) as contar_art FROM carrito_temporal WHERE nro_carrito= $nro_carrito and cod_articulo =$cod_articulo ";
          
           $consulta_existe_Art=mysqli_query($conectar, $sqlArt);
       
           $resultado_existencia = mysqli_fetch_array($consulta_existe_Art);
           if($resultado_existencia['contar_art'] == 1){
               $existe_en_carrito ="S";
           }else{
               $existe_en_carrito ="N";
           }

           if ($existe_en_carrito  =="S"){
           // UpdateEnCarrito($nro_carrito,$cod_articulo);
            // primero levanto la cantidad que hay de ese art en la  base y luego le sumo 1 
                $sql_select = "SELECT * FROM carrito_temporal WHERE nro_carrito= $nro_carrito and cod_articulo =$cod_articulo";
                $consulta_sql_select = mysqli_query($conectar,$sql_select);
                $resultado_sql_select = mysqli_fetch_array($consulta_sql_select);

                $cantidad_art =  $resultado_sql_select['cantidad'];
                $cantidad_art = $cantidad_art + 1;

                $sql_update = "UPDATE carrito_temporal set cantidad = $cantidad_art where nro_carrito= $nro_carrito and cod_articulo =$cod_articulo " ;
                $conecta_sql_update = mysqli_query($conectar, $sql_update) ;
                if ($conecta_sql_update){
                    header("Location: carrito.php?nro_carrito=$nro_carrito");
                }else {
                    header("Location: muestra_Categorias.php?errUpdatecarrito1");
                }

           }else{
             //InsertaEnCarrito($nro_carrito,$cod_articulo,1,1);
              // levanto los datos del articulo para insertarlos 
                    $insert_carrito = "INSERT INTO carrito_temporal (nro_carrito,cod_articulo,tamanio_articulo,cantidad) VALUES ($nro_carrito,$cod_articulo,1,1)";
                        
                    $conecta_insert_carrito = mysqli_query($conectar,  $insert_carrito); 
                    // si inserto 
                    if($conecta_insert_carrito){
                        header("Location: carrito.php?nro_carrito=$nro_carrito");
                    }else{ //si no inserto 
                        header("Location: muestra_Categorias.php?errNoInsertoCarrito1");
                    }
           }

            
        }
        else{
            // tengo que volver y decirle que no se puede agregar ese item por falta de stock 
            header("Location:muestra_Categorias.php?noalcanzastock");
        }
    }
    else {
        header("Location: muestra_Categorias.php?nohaystock1");
    }


}
else {
    // como no existe la sesion asociada a un carrito, entonces tengo que levantar
    // el maximo nro de carrito de la tabla temporal_sesiones_Carrito y sumar 1, si es la primera vez, entonces vale 1
    // e insertar ese nro de carrito y la sesion, y luego los datos del articulo los tengo que insertar en la tabla del carrito temporal
    //$nro_carrito = ProximoNroCarrito();
    $mayor_nro_carrito ="SELECT max(nro_carrito) as max FROM `temporal_sesiones_carrito`";
    $ejecutar_mayor=mysqli_query($conectar, $mayor_nro_carrito);

    $resultado = mysqli_fetch_array($ejecutar_mayor);
    if ($resultado){
        if (is_null($resultado['max'])){
            $nro_carrito = 1;
    
        }else{
            $nro_carrito = $resultado['max'] + 1;
        }

    }else {
        header("Location: muestra_Categorias.php?errselectNroCarrito");
    }
    // insertamos en la tabla el nuevo nro de carrito y la sesion 

    $insert = "INSERT INTO  temporal_sesiones_carrito (id_sesion, nro_carrito) VALUES ('$id_sesion', $nro_carrito) ";
    $inserta = mysqli_query($conectar, $insert);

    if ($inserta){
        // si insertamos la cabecera, ahora vamos a insertar el detalle 
        // levantamos el articulo que quiere insertar 

        $cod_articulo = (int) $_GET['cod_articulo'];
        //vamos a buscar que stock este articulo tiene asignado y que stock esta en la tabla temporal de carritos
        // una vez que el carrito se transforma en un pedido, de la tabla articulos descontamos los items vendidos
       // $stock_tabla_articulos = ConsultaStockArt ($cod_articulo) ; 
       $sql_stock = "SELECT * FROM ARTICULOS WHERE cod_articulo = $cod_articulo" ; 
       $conecta_sql_art = mysqli_query($conectar, $sql_stock);
      
       if ($conecta_sql_art){
           $datos_articulo = mysqli_fetch_array($conecta_sql_art);
       }
       else{
           header("Location: muestra_categorias.php?errdatosart");
       }
       $stock_tabla_articulos = (int) $datos_articulo['stock'];

        // ahora levanto el stock de la tabla temporal del carrito reservado no importa la sesion 
      //  $cant_recervada_en_carrito = CantidaddeArtenCarrito($cod_articulo) ;
      $sql_cant_art ="SELECT sum(cantidad) as cant_articulo FROM carrito_temporal where cod_articulo =$cod_art";
      $conecta_sql_cant_art =mysqli_query($conectar,  $sql_cant_art); 
      
  
      if ($conecta_sql_cant_art){
          $cant_articulo =  mysqli_fetch_array($conecta_sql_cant_art);
  
      }else{
          header("Location: muestra_categorias.php?errCantCarrito"); 
      }
  
      // si es null entonces 0
      if(is_null($cant_articulo['cant_articulo'])){
        $cant_reservada_en_carrito = 0 ; 
  
      }else {
        $cant_reservada_en_carrito =$cant_articulo['cant_articulo'] ; 
      }


        // ahora le resto la cantidad reservada en el carrito al stock del articulo, solo si el stock es mayor a 0

        if ($stock_tabla_articulos > 0){
            $stock_final = $stock_tabla_articulos - $cant_reservada_en_carrito; 

            // si el stock final es mayor a 0, entonces puedo agregar el item al carrito, en caso de que no, le digo que no hay stock 
            if($stock_final > 0){
                // levanto los datos del articulo para insertarlos 
               // InsertaEnCarrito($nro_carrito,$cod_articulo,1,1);
               $insert_carrito = "INSERT INTO carrito_temporal (nro_carrito,cod_articulo,tamanio_articulo,cantidad) VALUES ($nro_carrito,$cod_articulo,1,1)";
                        
               $conecta_insert_carrito = mysqli_query($conectar,  $insert_carrito); 
               // si inserto 
               if($conecta_insert_carrito){
                   header("Location: carrito.php?nro_carrito=$nro_carrito");
               }else{ //si no inserto 
                   header("Location: muestra_Categorias.php?errNoInsertoCarrito1");
               }
            }
            else{
                // tengo que volver y decirle que no se puede agregar ese item por falta de stock 
                header("Location:  muestra_Categorias.php?errnoalcanzastock");
            }
        }else {
            header("Location:  muestra_Categorias.php?errnohaystock");
        }

    }
    else {
        header("Location:  muestra_Categorias.php?err2");
    }



}


    
  


?>