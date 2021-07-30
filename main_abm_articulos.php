<?php


$consulta = "SELECT * FROM categorias";

$lista_categorias=mysqli_query($conectar, $consulta);


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
                 <section class="get-in-touch">  
                    <div class="container" >
                  
                        <h5 class="title" style="font-family: Open Sans; font-size: 30px;">Ingresar Artículo</h5>
                        <form  class="contact-form row"  action="guardar_articulo.php" method="POST">
                            <div class="form-field col-lg-6">
                                <input id="codigo" name="codigo" class="input-text js-input" type="text" placeholder="Ingrese Codígo" required>
                               
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="denom" name="denominacion" class="input-text js-input" type="text" placeholder="Ingrese Denominación" required>
                               
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="file" name="foto_articulo" class="input-text js-input" type="file" placeholder="Ingrese Foto" required>
                                
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="precio" name ="precio" class="input-text js-input" type="float" placeholder="Ingrese Precio" required>
                                
                            </div>
                            <div class="form-field col-lg-6 ">
                            <select id="categoria" class="input-text js-input" name="categoria"  placeholder="Ingrese Categoria" required >
                                    <?php

                                    while($dropd = mysqli_fetch_array($lista_categorias))
                                    {?>
                                    <option value="<?php echo $dropd['cod_categoria'];?>"><?php echo $dropd['cod_categoria'];?> </option>
                                 
                                    <?php }  ?>
                                   
                            </select>
                                
                            </div>
                            <div class="form-field col-lg-12">
                                <input id="message" name="descripcion" class="input-text js-input" type="text" placeholder="Ingrese Descripción" required>
                               
                            </div>
                            <div class="form-field col-lg-12">
                                <input class="submit-btn" type="submit" value="GRABAR">
                            </div>
                        </form>
                   
                    </div>
                </section>



        </main><!-- End #main -->

    </body>

</html>