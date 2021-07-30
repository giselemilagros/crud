
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

        <section class="get-in-touch">  
                    <div  class="container">
                  
                        <h5 class="title" style="font-family: Open Sans; font-size: 30px;">Datos de Usuario</h5>
                        <form id="abmArt" class="contact-form row" action="logout.php" method="POST">
                            <div class="form-field row-lg-2">
                                <label  for="exampleInputEmail1">Mail</label>
                                <h5 id="mail" class="input-text js-input" type="email" name ="mail" ><?php echo $mail; ?> </h5>
                            </div>
                           
                            <div class="form-field row-lg-4 ">
                                <label  for="exampleInputEmail1">Usuario</label>
                                <h5 id="mail" class="input-text js-input" type="text" name ="usuario_cierra" ><?php echo $usuario; ?> </h5>
                           
                            </div>
                        
                            <div id="divbotones" class="form-field col-lg-12">
                                <input class="submit-btn" type="submit" value="CERRAR SESIÓN"> <br>
                                <span class='error'><?php if (isset($_GET['err'])) {
                                    echo "Error Cerrando Sesión";
                                }?></span>
                                <a  class="submit-btn" href="pedidos_usuario.php">VER MIS PEDIDOS</a> <br>
                                <a  class="submit-btn" href="modificar_datos_usuario.php">MODIFICAR</a> <br>
                            </div>
                           
                        </form>
                   
                    </div>
          </section>


</main><!-- End #main -->

</body>

</html>