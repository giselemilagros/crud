<?php

//localhost es mi pc, root es el usuario, "" es la contraseña , alumnos2020 el nombre de la base 
$conectar = mysqli_connect("localhost","root","","concrete_jungle");

if(mysqli_connect_errno()){

    echo 'Error de conexion a base de datos';
    header("location: index.php");
}else{
    //echo 'se conecto correctamente <br>';
}