

<?php
// validacion de mail 

if (isset($_POST['mail'])  )  {
    echo "falta indicar mail " ; 
    // modifico en el html 
    echo "<br>";
}

// validacion de contraseña

if (isset($_POST['password']) ){
    echo "<h1>falta indicar contraseña </h1>" ;
}

?>