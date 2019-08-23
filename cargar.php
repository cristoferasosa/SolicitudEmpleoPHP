<?php

session_start();
include "conexionbd.php";

$CORREO=strtoupper($_POST ['LOGIN']);
$NOMBRECOMPLETO =strtoupper($_POST ['NOMBRECOMPLETO']);
$MOTIVO = $_POST ['MOTIVO'];


$archivo = $_FILES;

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
        echo "Información grabada con exito!!";
        echo '<script type="text/javascript"> window.location.href="index.html"; </script>';

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $archivo['archivo']['name'] . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo file_get_contents($ruta);

    } catch (\Throwable $th) {
        echo'<script type="text/javascript">alert("Falló la transferencia"); 
                     window.location.href="www.google.com";   </script>';
    }
} else {
    var_dump($archivo);
}

?>