<?php

session_start();
include "conexionbd.php";

if (!isset($_SESSION['USUARIO_LOGUEADO'])){

    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="index.html";   </script>';
}

$CORREO=strtoupper($_POST ['LOGIN']);
$NOMBRECOMPLETO =strtoupper($_POST ['NOMBRECOMPLETO']);
$MOTIVO = $_POST ['MOTIVO'];
$archivo = $_FILES;
var_dump($archivo);

if (!empty($archivo)) {
    try {
        $ruta = "Files/";
        if (!is_dir($ruta)) {
            mkdir($ruta);
        }
        $ruta = $ruta . $archivo['archivo']['name'];
        move_uploaded_file($archivo['archivo']['tmp_name'], $ruta);
        $query = "Insert into tb_solicitud (nombreingresa,correoingresa,rutapdf,nombrearchivo,motivo) values
                    ('".$NOMBRECOMPLETO."','".$CORREO."','".$ruta."','". $archivo['archivo']['name']."','".$MOTIVO."')"
                    or die("Error in the consult.." . mysqli_error(conecta()));
        $resultado =mysqli_query(conecta(),$query);

       /*echo "Informacion Grabada con exito";*/

            echo'<script type="text/javascript">alert("Informacion Grabada con exito"); 
                     window.location.href="solicitud.php";   </script>';


    } catch (\Throwable $th) {
        echo'<script type="text/javascript">alert("Falló la transferencia"); 
                     window.location.href="index.html";   </script>';
    }
    } else {
    echo'<script type="text/javascript">alert("Falló la transferencia"); 
                     window.location.href="index.html";   </script>';
    }
mysqli_close(conecta());
?>


