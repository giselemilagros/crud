<?php


$consulta = "SELECT * FROM articulos";

$lista_articulos = mysqli_query($conectar, $consulta);


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

                <!--aca va una tabla con los articulos-->
            
                <div class="row table-responsive">
                    <table class="table table-responsive">
                        
                        <tr>
                            <th>
                            Foto
                            </th>
                            <th>
                            Cod.Artículo
                            </th> 
                            <th>
                            Denominación
                            </th> 
                            <th>
                            Categoria
                            </th> 
                            <th>
                            Direccion
                            </th> 
                            <th>
                            Descripción
                            </th> 
                            <th>
                            Precio Unitario
                            </th> 
                            <th>
                            Stock
                            </th>
                            <th>
                            Eliminar
                            </th> 
                        

                    
                        </tr>

                        
                            <?php

                             while($tabla = mysqli_fetch_array($listado))
                            {?>

                                <tr>
                                    <td><?php echo $tabla['id_tutor'];?></td>
                                    <td><?php echo $tabla['nombre_tutor'];?></td>
                                    <td><?php echo $tabla['dni'];?></td>
                                    <td><?php echo $tabla['apellido_tutor'];?></td>
                                    <td><a href="modificar.php?id=<?php echo $tabla['id_usuario'];?>"><i class="fas fa-pencil-alt"></i></a></td>
                                
                                    <td><a href="eliminar.php?id=<?php echo $tabla['id_usuario'];?>"><i class="fas fa-trash-alt"></i></a></td>
                            
                                
                                </tr>
                            <?php } ?>

     
   
                    </table>
        
                </div>
            
            

        </main><!-- End #main -->

        
    </body>

</html>