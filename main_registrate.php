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

 <!-- aca tiene que ir una imagen de fondo -->
 <section class="get-in-touch">  
                    <div class="container" >
                  
                        <h5 class="title" style="font-family: Open Sans; font-size: 40px;">Registrate</h5>

                      <!-- onsubmit="return comprobarDatosFormulario()"-->
                        <form id="formulario" class="contact-form row" action="guardar_usuario.php" method="POST" onsubmit= "return validar()">
                            <div class="form-field col-lg-6">
                                <input id="name" name="usuario" class="input-text js-input" type="text" placeholder="Ingrese Nombre y Apellido" required>
                                <span class='error'><?php if (isset($_GET['erruser'])) {
                                    echo "Complete Nombre Completo";
                                }?></span>
                            </div>
                            <div class="form-field col-lg-6">
                                <input id="dni" name="dni" class="input-text js-input" type="number" placeholder="Ingrese su DNI" required>
                                <span class='error'><?php if (isset($_GET['errdni'])) {
                                    echo "Complete DNI";
                                }?></span>
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="mail" name ="mail" class="input-text js-input" type="email" placeholder="Ingrese su Mail" required>
                                <span class='error'><?php if (isset($_GET['errmail'])) {
                                    echo "Complete Mail";
                                }?></span>
                                <small  class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                               
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="password" name="password" class="input-text js-input" type="password" placeholder="Ingrese Password" required  >
                                <span class='error'><?php if (isset($_GET['errpass'])) {
                                    echo "Complete Password";
                                }?></span>
                                
                            </div>
                            <div class="form-field col-lg-6 ">
                                <input id="direccion" name="direccion" class="input-text js-input" type="Adress" placeholder="Ingrese su Dirección" required>
                                <span class='error'><?php if (isset($_GET['errdirec'])) {
                                    echo "Complete su Dirección";
                                }?></span>
                            </div>
                            <div class="form-field col-lg-6 ">
                                
                                
                                <select id="provincia" class="input-text js-input" name="provincia"  placeholder="Ingrese Provincia" required >
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
                                <input id="ciudad" name="ciudad" class="input-text js-input" type="text" placeholder="Ingrese Ciudad" required>
                                <span class='error'><?php if (isset($_GET['errciu'])) {
                                    echo "Complete su Dirección";
                                }?></span>
                              
                                
                            </div>
                            <div class="form-field col-lg-12">
                                <input id="CodigoPostal" name="codigo_postal" class="input-text js-input" type="text" placeholder="Codigo Postal" required>
                                <span class='error'><?php if (isset($_GET['errcp'])) {
                                    echo "Complete su Dirección";
                                }?></span>
                            </div>
                            <div class="form-field col-lg-12">
                                <input id="btn_grabar" class="submit-btn"  type="submit" value="GRABAR" >
                                <span class='error'><?php if (isset($_GET['err'])) {
                                    echo "No se pudo Registrar";
                                }?></span>
                            </div>
                        </form>
                   
                    </div>
  </section>
  

</main><!-- End #main -->

<script language="javascript">

      function validar(){
       let bandera = true ; 
       let nombre = document.getElementById('name').value;
       let mail = document.getElementById('mail').value;
       let dni = document.getElementById('dni').value;
       let password = document.getElementById('password').value;
       let direccion = document.getElementById('direccion').value;
       let provincia = document.getElementById('provincia').value;
       let ciudad = document.getElementById('ciudad').value;
       let cod_postal = document.getElementById('CodigoPostal').value;
       nombre = nombre.trim();
       mail= mail.trim();
       dni = dni.trim();
       password= password.trim();
       direccion = direccion.trim();
       provincia = provincia.trim();
       ciudad = ciudad.trim();
       cod_postal = cod_postal.trim();
       
       // || /^\s/.test(nombre)
        if (nombre.length == 0){
            alert("Completar su Nombre completo por favor");
            bandera = false;
          
        }
        if (mail.length == 0){
            alert("Complete su mail por favor ");
            bandera = false;
          
        }
        if (dni.length == 0){
            alert("Complete su dni por favor ");
            bandera = false;
          
        }
        if (password.length == 0){
            alert("Debe indicar una contraseña");
            bandera = false;
          
        }
        if (direccion.length == 0){
            alert("Complete su dirección para saber donde enviar su pedido");
            bandera = false;
          
        }
        if (provincia.length == 0){
            alert("Indique la Provincia donde vive");
            bandera = false;
          
        }
        if (ciudad.length == 0){
            alert("Indique la ciudad donde vive");
            bandera = false;
          
        }
        if (cod_postal.length == 0){
            alert("Indique el codigo postal de la ciudad");
            bandera = false;
          
        }
      
        return bandera; 
      
      }
      /*
      function comprobarDatosFormulario(){
        var comprobacion = true;
        var expReg = /[\s\S]{3}/;		
       
        var nombre = document.getElementById('name').value;
        var mail = document.getElementById("mail").value;
        var dni = document.getElementById("dni").value;
        var password = document.getElementById("password").value;
        var direccion = document.getElementById("direccion").value;
        var provincia = document.getElementById("provincia").value;
        var ciudad = document.getElementById("ciudad").value;
        var cod_postal = document.getElementById("codigoPostal").value;
       
          if(nombre.length < 0 ){
            alert('Debe completar su nombre completo');
            comprobacion = false; 
          }
          if (mail.lenght < 0){
            alert("Debe ingresar su Mail"); 
            comprobacion = false ; 
        }
        // si la clave no es null, entonces me fijo su largo de cadena 
        if (password.lenght < 0){
          alert("Debe ingresar su Password"); 
            comprobacion = false ; 
        }else{
          if (password.length != 6) {
            alert('El password debe contener 6 caracteres');
            comprobacion false ; 
          } 
          return comprobacion ; 
        }
        

        
      }*/
    </script>


</body>

</html>