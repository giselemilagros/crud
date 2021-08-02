<?php


$consulta = "SELECT * FROM articulos ORDER BY VIGENTE desc";

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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
                            Codígo
                            </th> 
                            <th>
                            Denominación
                            </th> 
                            <th>
                            Cod.
                            </th> 
                            <th>
                            Categoria
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
                            Vigente
                            </th>
                            <th>
                            Modificar
                            </th> 
                            <th>
                            Eliminar
                            </th> 
                        

                    
                        </tr>

                        
                            <?php

                             while($tabla = mysqli_fetch_array($lista_articulos))
                            {?>

                                <tr>
                                    <td> <img src="<?php echo $tabla['foto_articulo'];?>" width="100" height="100" alt="img_articulo...">  </td>
                                    <td><?php echo $tabla['cod_articulo'];?></td>
                                    <td><?php echo $tabla['denom_articulo'];?></td>
                                    
                                    <?php
                                        $categoria = $tabla['cod_categoria'];
                                        // consulta de denominacion de categoria
                                        $consulta = "SELECT * FROM categorias where cod_categoria =$categoria";

                                        $consulta_categoria = mysqli_query($conectar, $consulta);
                                        $categ_sql = mysqli_fetch_array($consulta_categoria);
                                         
                                    ?>

                                    <td><?php echo $tabla['cod_categoria'];?></td>
                                    <td><?php echo$categ_sql['nombre_categoria'];?></td>
                                    
                                    <td><?php echo $tabla['descripcion'];?></td>
                                    <td><?php echo $tabla['precio_unitario'];?></td>
                                    <td><?php echo $tabla['stock'];?></td>
                                    <td><?php echo $tabla['vigente'];?></td>
                                    <td><a href="modifica_articulos.php?cod_articulo=<?php echo $tabla['cod_articulo'];?>"><i class="fas fa-pencil-alt"></i></a></td>
                                
                                    <td><a href="eliminar_articulos.php?cod_articulo=<?php echo $tabla['cod_articulo'];?>"><i class="fas fa-trash-alt"></i></a></td>
                            
                                
                                </tr>
                            <?php } ?>

     
   
                    </table>
        
                </div>
            
            

        </main><!-- End #main -->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
    </body>

</html>