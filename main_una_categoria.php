<?php

// LEVANTO LA CATEGORIA QUE SE PASA POR LINK 
$id_categoria = $_GET['cod_categoria'];

$sql = "SELECT * FROM articulos WHERE cod_categoria= '$id_categoria'";

$listado = mysqli_query($conectar, $sql);



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
     <!--para que funcione el e-comerce-->
    <!-- Bootstrap CSS-->
     <link rel="stylesheet" href="distribution/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="distribution/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="distribution/vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="distribution/vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
   
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="distribution/css/custom.css">
    <link rel="stylesheet" href="distribution/css/style.green.css" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!------ Include the above in your HEAD tag ---------->

    

    </head>
 
    <body>
        
    
    <main id="main">

            <!-- ======= Breadcrumbs Section ======= -->
            <section class="breadcrumbs">
                <div class="container">

                    <div class="d-flex justify-content-between align-items-center">
                    <h3 class="logo mx-auto d-block"><strong> Concrete Jungle Grow SHOP</strong> </h3>
                    <p class="mx-auto d-block">Todos los insumos para tu Cultivo, asesoramiento y envios en el día</p>
                    </div>
                    
                </div>
            </section><!-- Breadcrumbs Section -->
            <!-- aca tiene que ir una imagen de fondo -->

          <div class="container">
            <div class="row products">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php  while($tabla = mysqli_fetch_array($listado))
                {?>
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="#"><img src=<?php echo $tabla['foto_articulo'];?> alt="" class="img-fluid"></a></div>
                        
                      </div>
                    </div><a href="#" class="invisible"><img src=<?php echo $tabla['foto_articulo'];?>alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a style="font-family: Open Sans; font-size: 20px;" href="#"><?php echo $tabla['cod_articulo']; echo " - " ;echo $tabla['denom_articulo']; ?></a></h3>
                      <p class="price"> 
                        <del></del><?php echo $tabla['precio_unitario'];?>
                      </p>
                      <p class="buttons"><a href="#" class="btn btn-outline-secondary">ver Detalles</a><a style=" background-color: #53b124;  border-color: #53b124;" href="carrito.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Agregar a Carrito</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                 <?php } ?>
                </div>
            </div>   
         </div>

        </main><!-- End #main -->

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