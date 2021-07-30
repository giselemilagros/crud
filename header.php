
<?php


$consulta = "SELECT * FROM categorias";

$listado=mysqli_query($conectar, $consulta);

session_start();

if (empty( $_SESSION['usuario'])){
  $_SESSION['usuario'] = "Iniciar Sesión";
}


$usuario = $_SESSION["usuario"];


if($usuario =="Iniciar Sesión"){
  $hreferencia = "inicio_sesion_comp.php";
}else{
  $hreferencia = "cerrar_sesion.php";
}

// para el inicio

if($usuario =="ADMINISTRADOR"){
  $hrefindex = "index_admin.php";
}else{
  $hrefindex = "index.php";
}

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

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex justify-content-center align-items-center ">

    <nav id="navbar" class="navbar navbar-expand-lg">
    <i class="bi bi-list mobile-nav-toggle"></i>
    <div class="navbar-buttons">
      <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Buscar</span><i class="fa fa-search"></i></button>
      <button type="button" data-toggle="collapse" class="btn btn-outline-secondary navbar-toggler"><a href="carrito.php" ><i class="fa fa-shopping-cart"></i></a></button>
    </div>
      <ul>
        
        <li><a class="nav-link scrollto active" href=<?php echo $hrefindex; ?> >Inicio</a></li>
      
        <li class="dropdown"><a href="muestra_Categorias.php"><span>Productos</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <!--trae de la base todas las categorias-->
          <?php

            while($dropd = mysqli_fetch_array($listado))
            {?>

              <li><a href="muestra_articulos.php?cod_categoria=<?php echo $dropd['cod_categoria'];?>"> <?php echo $dropd['nombre_categoria'];?> </a></li>
               
               
            <?php } ?>
           </ul>

           
        </li>
       
        <li><a class="nav-link scrollto" href="registrate_comp.php">Registrate</a></li>
        
        <li><a class="nav-link scrollto" href=<?php echo $hreferencia; ?> > <?php echo $usuario;?> </a></li>
        
           
      </ul>
      <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a style=" background-color: #53b124; border-color: #53b124;" data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Buscar</span><i class="fa fa-search"></i></a>
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a  style=" background-color: #53b124;  border-color: #53b124;" href="carrito.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span> Carrito</span></a></div>
       </div>
       
     
    </nav><!-- .navbar -->
    <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" placeholder="Buscar" class="form-control">
              <div class="input-group-append">
                <button style=" background-color: #53b124;  border-color: #53b124;" type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>

  </header><!-- End Header -->
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