<?php

// levantamos con get, el codigo de articulo para levantar los datos del articulo 

$cod_articulo_Get = (int) $_GET['cod_articulo'];


$sql_datos_art ="SELECT * FROM articulos where cod_articulo =$cod_articulo_Get";

$consulta_datos_art = mysqli_query($conectar,$sql_datos_art );

$lista_datos_art = mysqli_fetch_array($consulta_datos_art);

$denom_articulo = $lista_datos_art['denom_articulo'];
$precio_unitario = (float) $lista_datos_art['precio_unitario'];
$cod_categoria =(int) $lista_datos_art['cod_categoria'];
$stock = (int) $lista_datos_art['stock'];
$descripcion = $lista_datos_art['descripcion'];
$foto_articulo = $lista_datos_art['foto_articulo'];
$vigente = $lista_datos_art['vigente'];


//levanta categorias

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
                  
                        <h5 class="title" style="font-family: Open Sans; font-size: 30px;">Modificar Artículo</h5>
                        <form  class="contact-form row"  action="update_articulos.php?cod_articulo=<?php echo $cod_articulo_Get;?>&foto_articulo=<?php echo $foto_articulo;?>" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-field col-lg-10">
                                <input id="denom" name="denominacion" class="input-text js-input" type="text" value="<?php echo $denom_articulo;?>"  required>
                               
                            </div>
                            <div class="form-field col-lg-2">
                            <select id="vigente" class="input-text js-input" name="vigente"  value=<?php echo $vigente;?> required >
                                 <option value="S">SI</option>
                                 <option value="N">NO</option>
                            </select>
                               
                            </div>
                           
                           
                            <div class="form-field col-lg-4">
                                <input id="precio" name ="precio" class="input-text js-input" type="float" value="<?php echo $precio_unitario;?>" required>
                                
                            </div>
                            <div class="form-field col-lg-8">
                                <select id="categoria" class="input-text js-input" name="categoria"  options="<?php echo $cod_categoria;?>"  required >
                               
                                        <?php

                                        while($dropd = mysqli_fetch_array($lista_categorias))
                                        {?>
                                        <option value="<?php echo $dropd['cod_categoria'];?>" <?php if($dropd['cod_categoria'] == $cod_categoria ){ echo "selected='selected'"; }  ?>  > <?php echo $dropd['nombre_categoria'];?> </option>
                                    
                                        <?php }  ?>
                                    
                                </select>
                                
                            </div>
                            <div class="form-field col-lg-6">
                                <input id="stock" name ="stock" class="input-text js-input" type="number" value=<?php echo $stock;?> required>
                                
                            </div>
                            <div class="form-field col-lg-12">
                                <input id="message" name="descripcion" class="input-text js-input" type="text" value="<?php echo $descripcion;?>" required>
                               
                            </div>
                            <div class="form-field col-lg-12">
                                <div id="file-preview-zone"><img src="<?php echo $foto_articulo;?>" alt="img_articulo..." width="300" heigth ="300"></div>
                            </div>
                            <div class="form-field col-lg-12">
                                <label for="user_img" class="mt-4">Cambiar imagen de Artículo</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
                                <input type="file" name="user_img" id="user_img" class="form-control-file my-2 " accept="image/*" value="<?php echo $foto_articulo;?>" >
                            
                            </div>
                           
                            <div class="form-field col-lg-12">
                                <input class="submit-btn" type="submit" value="GRABAR">
                            </div>
                            <span class='error'><?php if (isset($_GET['err'])) {
                                    echo "Error actualizando el Artículo";
                            }?></span>
                             <span class='grabar'><?php if (isset($_GET['grab'])) {
                                    echo "El Artículo se Actualizo correctamente";
                            }?></span>
                        </form>
                   
                    </div>
                </section>



        </main><!-- End #main -->

        <script>
            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
        
                    reader.onload = function (e) {
                        var filePreview = document.createElement('img');
                        filePreview.id = 'file-preview';
                        //e.target.result contents the base64 data from the image uploaded
                        filePreview.src = e.target.result;
                        //console.log(e.target.result);
                        filePreview.width ='300'
                        filePreview.heigth ='300'
        
                        var previewZone = document.getElementById('file-preview-zone');
                        previewZone.appendChild(filePreview);
                    }
        
                    reader.readAsDataURL(input.files[0]);
                }
            }
        
            var fileUpload = document.getElementById('user_img');
            fileUpload.onchange = function (e) {
                readFile(e.srcElement);
            }
 
        </script>   

    </body>

</html>