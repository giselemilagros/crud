 
<?php


if (empty( $_SESSION['mail'])){
  header("location: inicio_sesion_comp.php");
}

$mail = $_SESSION["mail"];
$usuario =$_SESSION["usuario"];


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

  

</head>

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
  
  
  
  <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu">
                <div class="card-header">
                  <h3 class="h4 card-title">Sección de Cliente, Bienvenido: <?php echo $usuario; ?> </h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column">
                      <a style=" background-color: #53b124;  border-color: #53b124;" href="pedidos_usuario.php" class="nav-link active"><i class="fa fa-list"></i> Mis Pedidos</a> <br>   
                      <a style=" background-color: #53b124;  border-color: #53b124; color: #fff;" href="cerrar_sesion.php" class="nav-link"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
                  </ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div id="customer-orders" class="col-lg-9">
              <div class="box">
                <h1>Mis Pedidos</h1>
                <p class="lead">Todos tus Pedidos en un Solo lugar</p>
                <p class="text-muted">Si tiene alguna pregunta, no dude en contactarnos</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>N° Pedido</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>$ 150.00</td>
                        <td><span class="badge badge-info">Being prepared</span></td>
                        <td><a  style=" background-color: #53b124;  border-color: #53b124;"href="customer-order.html" class="btn btn-primary btn-sm">Ver</a></td>
                      </tr>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>$ 150.00</td>
                        <td><span class="badge badge-info">Being prepared</span></td>
                        <td><a style=" background-color: #53b124;  border-color: #53b124;" href="customer-order.html" class="btn btn-primary btn-sm">Ver</a></td>
                      </tr>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>$ 150.00</td>
                        <td><span class="badge badge-success">Received</span></td>
                        <td><a  style=" background-color: #53b124;  border-color: #53b124;" href="customer-order.html" class="btn btn-primary btn-sm">Ver</a></td>
                      </tr>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>$ 150.00</td>
                        <td><span class="badge badge-danger">Cancelled</span></td>
                        <td><a style=" background-color: #53b124;  border-color: #53b124;" href="customer-order.html" class="btn btn-primary btn-sm">Ver</a></td>
                      </tr>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>$ 150.00</td>
                        <td><span class="badge badge-warning">On hold</span></td>
                        <td><a style=" background-color: #53b124;  border-color: #53b124;"  href="customer-order.html" class="btn btn-primary btn-sm">Ver</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="distribution/vendor/jquery/jquery.min.js"></script>
    <script src="distribution/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="distribution/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="distribution/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="distribution/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="distribution/js/front.js"></script>


</main><!-- End #main -->

</body>

</html>