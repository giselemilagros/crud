<?php

//include 'conexion.php';

$consulta = "SELECT * FROM categorias";

$listado=mysqli_query($conectar, $consulta);



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
            <section>
                    <div class="container" >
                    
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                        <?php

                            while($tabla = mysqli_fetch_array($listado))
                            {?>
                           
                                <div class="col">

                                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-header" ><?php echo $tabla['cod_categoria'];?></div>
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-family: Open Sans" ><?php echo $tabla['nombre_categoria'];?> </h5>
                                                <p class="card-text"><?php echo $tabla['descripcion'];?></p>
                                            </div>
                                   


                                        <div class="card-footer">
                                        <small class="text-muted"><a href="muestra_articulos.php?cod_categoria=<?php echo $tabla['cod_categoria'];?> ">VER ARTÍCULOS DE ESTA CATEGORIA</a> </small>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            <?php } ?>
                           

                        </div>

                    
                    </div>




            </section>


        </main><!-- End #main -->

    </body>

</html>