
<?php



if (empty( $_SESSION['mail'])){
  header("location: inicio_sesion_comp.php");
}


if(empty( $_SESSION['coduser'])){
    header("location: inicio_sesion_comp.php");
}

$cod_usuario = $_SESSION['coduser'];

$sql = "SELECT *  FROM `usuarios` where cod_usuario =$cod_usuario";

$qseleccion = mysqli_query($conectar, $sql);

$array_Datos = mysqli_fetch_array($qseleccion);

if($qseleccion){
    //levanto los datos del usuario en variables 
    $nombre_completo = $array_Datos['nombre_completo'] ;
    $dni = $array_Datos['dni'] ;
    $mail = $array_Datos['mail'] ;
    $password =$array_Datos['password'] ;
    $direccion_completa =$array_Datos['direccion_completa'] ;
    $provincia =$array_Datos['cod_provincia'] ;
    $ciudad =$array_Datos['ciudad'] ;
    $cod_postal=$array_Datos['cod_postal'] ;
}


// con el codigo de usuario levanto los datos del usuario para mostrar en el form 

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
                  
                        <h5 class="title" style="font-family: Open Sans; font-size: 30px;">Modificar Datos de Usuario</h5>
                        <form id="abmArt" class="contact-form row" action="update_usuarios.php" method="POST">
                           

                            <div class="form-field col-lg-6">
                                <input id="name" name="usuario" class="input-text js-input" type="text" value = "<?php echo $nombre_completo; ?>" required > 
                                <span class='error'><?php if (isset($_GET['erruser'])) {
                                    echo "Complete Nombre Completo";
                                }?></span>
                            </div>
                            <div class="form-field col-lg-6">
                                <input id="dni" name="dni" class="input-text js-input" type="number" placeholder="Ingrese su DNI" value = "<?php echo $dni; ?>" required>
                                <span class='error'><?php if (isset($_GET['errdni'])) {
                                    echo "Complete DNI";
                                }?></span>
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="mail" name ="mail" class="input-text js-input" type="email" placeholder="Ingrese su Mail" value = "<?php echo $mail; ?>" required>
                                <span class='error'><?php if (isset($_GET['errmail'])) {
                                    echo "Complete Mail";
                                }?></span>
                                <small  class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                               
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="password" name="password" class="input-text js-input" type="password" placeholder="Ingrese Password"  required  >
                                <span class='error'><?php if (isset($_GET['errpass'])) {
                                    echo "Complete Password";
                                }?></span>
                                
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="direccion" name="direccion" class="input-text js-input" type="Adress" placeholder="Ingrese su Dirección" value="<?php echo $direccion_completa; ?>" required>
                                <span class='error'><?php if (isset($_GET['errdirec'])) {
                                    echo "Complete su Dirección";
                                }?></span>
                            </div>
                            <div class="form-field col-lg-6 ">
                                
                                
                                <select id="provincia" class="input-text js-input" name="provincia"  placeholder="Ingrese Provincia" value ="<?php echo $provincia; ?>" required >
                                  <script language="javascript">
                                  var states = new Array("Buenos Aires", "Capital Federal", "Catamarca", "Chaco", "Chubut", "Cordoba", "Corrientes", "Entre Rios", "Formosa", "Jujuy", "La Pampa", "La Rioja", "Mendoza", "Misiones", "Neuquen", "Rio Negro", "Salta", "San Juan", "San Luis", "Santa Cruz", "Santa Fe", "Santiago del Estero", "Tierra del Fuego", "Tucuman");
                                  for(var hi=0; hi<states.length; hi++)
                                  document.write("<option value=\""+states[hi]+"\">"+states[hi]+"</option>");
                                  </script>
                                </select>
                                <span class='error'><?php if (isset($_GET['errprov'])) {
                                    echo "Complete su Dirección";
                                }?></span>
                                
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="ciudad" name="ciudad" class="input-text js-input" type="text" placeholder="Ingrese Ciudad" value ="<?php echo $ciudad; ?>" required>
                                <span class='error'><?php if (isset($_GET['errciu'])) {
                                    echo "Complete su Dirección";
                                }?></span>
                              
                                
                            </div>
                            <div class="form-field col-lg-12">
                                <input id="CodigoPostal" name="codigo_postal" class="input-text js-input" type="text" placeholder="Codigo Postal" value="<?php echo $cod_postal; ?>" required>
                                <span class='error'><?php if (isset($_GET['errcp'])) {
                                    echo "Complete su Dirección";
                                }?></span>
                            </div>


                            <div class="form-field col-lg-12">
                                <input class="submit-btn" type="submit" value="GUARDAR CAMBIOS">
                                <span class='error'><?php if (isset($_GET['err'])) {
                                    echo "Error Guardando Cambios";
                                }?></span>
                               
                            </div>
                           
                        </form>
                   
                    </div>
          </section>


</main><!-- End #main -->

</body>

</html>