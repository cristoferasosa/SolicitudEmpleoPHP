<?php

declare( strict_types=1 );

session_start();

function validarUsuario(){
    include ('conexionbd.php');
    $CORREO= strtoupper($_POST ['email']);
    $CLAVE = strtoupper($_POST ['pwd']);


    $query = "SELECT * FROM tb_usuarios where correoe='".$CORREO."' and clave = MD5('".$CLAVE."')"
        or  die("Error in the consult.." .mysqli_error(conecta()));

    $resultado = mysqli_query(conecta(),$query);
    $numerofilas = mysqli_num_rows($resultado);

    if($numerofilas == 0){
        session_unset();
        echo '<script type="text/javascript"> alert("Usuario Incorrecto"); window.location.href = "index.html"; </script>';
    }else{
        while ($row = mysqli_fetch_array($resultado)){
            echo " <br>".$row["CORREOE"] . "es valido </br>";
            $_SESSION['USUARIO_LOGUEADO'] = true;
            $_SESSION['LOGIN'] = $row["CORREOE"];
            $_SESSION['NOMBRE'] = $row["NOMBRECOMPLETO"];

            echo '<script type="text/javascript"> window.location.href="solicitud.php"; </script>';
        }
    }
    mysqli_close(conecta());
}
validarUsuario();
?>
