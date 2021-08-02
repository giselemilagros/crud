
<?php


$id_sesion= session_id();
$nro_carrito = $_GET['nro_carrito'];
$consulta = "SELECT * FROM carrito_temporal where nro_carrito=$nro_carrito ";

$lista_carrito=mysqli_query($conectar, $consulta);


?>


 
 <!DOCTYPE html>
<html lang="es">

    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Concrete Jungle Grow Shop</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</head>
<body>
 

 
 <div id="all">
      <div id="content">
        <div class="container">
          <div id="carrito_fila" class="row">
          
            
            <div id="basket" class="col-lg-9">
              <div class="box">
                <form method="post" action="checkout1.html">
                  <h1>Carrito de Compras</h1>
                  <p class="text-muted">Detalle de Artículos Comprados</p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th >Productos</th>
                          <th ></th>
                          <th ></th>
                          <th>Cantidad</th>
                          <th>Precio Unitario</th>
                          <th>Total Item</th>
                          <th>Eliminar Item</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                         while($tabla = mysqli_fetch_array($lista_carrito))
                      {?>
                        <tr>

                            <?php
                              $cod_articulo = $tabla['cod_articulo'];
                              // consulta de denominacion de categoria
                               $consulta = "SELECT * FROM articulos where cod_articulo =$cod_articulo";

                              $consulta_articulos = mysqli_query($conectar, $consulta);
                              $tabla_articulos= mysqli_fetch_array($consulta_articulos);

                            ?>

                            <td><a ><img src="<?php echo $tabla_articulos['foto_articulo'];?>" alt="Foto_articulo..."></a></td>
                            <td><a ><?php echo $tabla_articulos['cod_articulo'];?></a></td>
                            <td><a ><?php echo $tabla_articulos['denom_articulo'];?></a></td>
                            <td><a ><?php echo $tabla['cantidad'];?></a></td>
                            
                            <td><?php echo "$"; echo $tabla_articulos['precio_unitario'];?></td>
                            <td><?php echo "$"; echo ($tabla_articulos['precio_unitario'] * $tabla['cantidad']);?></td>
                           
                            <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                        <?php
                        // VAMOS A LEVANTAR PARA EL CARRITO, LA SUMA DE LOS PRECIOS UNITARIOS POR LA SUMA DE LA CANTIDAD 
                              
                              // consulta de denominacion de categoria
                               $consulta_sql = "SELECT (SUM(articulos.precio_unitario * carrito_temporal.cantidad)) as total from carrito_temporal,articulos where carrito_Temporal.cod_articulo = articulos.cod_articulo and carrito_temporal.nro_carrito =$nro_carrito ";

                              $consulta_total = mysqli_query($conectar, $consulta_sql);
                              $tabla_total= mysqli_fetch_array($consulta_total);

                            ?>
                          <th colspan="5">Total</th>
                          <th colspan="2"><?php echo "$"; echo $tabla_total['total']; ?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continuar Comprando</a></div>
                    <div class="right">
                      <button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Actualización de la Compra</button>
                      <button style=" background-color: #53b124;  border-color: #53b124;" type="submit" class="btn btn-primary">Enviar Pedido <i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.box-->
              <div class="row same-height-row">
                <div class="col-lg-3 col-md-6">
                  <div class="same-height">
                    <h3>También te pueden gustar estos productos</h3>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html"><img src="img/product2.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.html"><img src="img/product2_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="img/product2.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html"><img src="img/product1.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.html"><img src="img/product1_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="img/product1.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html"><img src="img/product3.jpg" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.html"><img src="img/product3_2.jpg" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="img/product3.jpg" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
              </div>
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              <div id="order-summary" class="box">
                <div class="box-header">
                  <h3 class="mb-0">Resumen de Pedido</h3>
                </div>
                <p class="text-muted">Los Costos de envio se calculan en base a la Zona</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                     
                      <tr class="total">
                    
                        <td>Total de la Orden</td>
                        <th><?php echo "$"; echo $tabla_total['total'];  ?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box_cupon">
                <div class="box-header">
                  <h4 class="mb-0">Ingrese Cupón</h4>
                </div>
                <p class="text-muted">Si tiene un código de cupón, ingréselo en el cuadro a continuación.</p>
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control"><span class="input-group-append">
                      <button style=" background-color: #53b124;  border-color: #53b124;" type="button" class="btn btn-primary"><i class="fa fa-gift"></i></button></span>
                  </div>
                  <!-- /input-group-->
                </form>
              </div>
            </div>
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
    </div>
   
   
    </main>
    
     <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="distribution/vendor/jquery/jquery.min.js"></script>
    <script src="distribution/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="distribution/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="distribution/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="distribution/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="distribution/js/front.js"></script>

</body>

</html>