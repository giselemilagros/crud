
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
                  
                        <h5 class="title" style="font-family: Open Sans; font-size: 30px;">Iniciar Sesión</h5>
                        <form id="abmArt" class="contact-form row" action="login.php" method="POST">
                            <div class="form-field row-lg-2">
                                <input id="mail" class="input-text js-input" type="mail" placeholder="Ingrese su Mail" name ="mail" required>
                               
                            </div>
                            <small  class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                            <div class="form-field row-lg-4 ">
                                <input id="password" class="input-text js-input" type="password" placeholder="Ingrese Password" name="password" required>
                               
                            </div>
                            
                            
                            
                            <div class="form-field col-lg-12">
                                <input class="submit-btn" type="submit" value="INGRESAR">
                                <span class='error'><?php if (isset($_GET['err'])) {
                                    echo "Usuario y/o contraseña incorrecto";
                                }?></span>
                            </div>
                            <label  for="exampleInputEmail1">¿AÚN NO TENES CUENTA?</label><BR></BR>
                            <a class="exampleInputEmail1" href="registrate.html">Registrate de Modo Seguro</a>
                        </form>
                   
                    </div>
          </section>


</main><!-- End #main -->

</body>

</html>