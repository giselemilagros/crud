// levanto los datos del form 



document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
  });
  
  function validarFormulario(evento) {
    evento.preventDefault();
    var mail = document.getElementById("mail").value;
    var nombre_completo = document.getElementById("name").value;
    var dni = document.getElementById("dni").value;
    var password = document.getElementById("password").value;
    var direccion = document.getElementById("direccion").value;
    var provincia = document.getElementById("provincia").value;
    var ciudad = document.getElementById("ciudad").value;
    var cod_postal = document.getElementById("odigoPostal").value;
    
    if (mail.trim.lenght == 0){
        alert("NO INGRESO MAIL"); 
        return; 
    }
    if (password.length != 6) {
        alert('El password debe contener 6 caracteres');
        return;
      }
    this.submit();
  }
