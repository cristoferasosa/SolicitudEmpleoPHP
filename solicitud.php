<!DOCTYPE html>
<html lang="es">

<?php
session_start();

if (!isset($_SESSION['USUARIO_LOGUEADO'])){

    echo'<script type="text/javascript">  alert("usted no está logueado"); window.location.href="index.html";   </script>';
}

$USUARIO = $_SESSION['LOGIN'];
$NOMBRE = $_SESSION['NOMBRE'];

?>

<head>
    <title>Ingreso de Información</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">

 </head>
<body background="images/fondo-luz.jpg">
<div class="contact1">
    <div class="card-body" align="center">

        <div class="contact1-pic js-tilt" data-tilt>
            <img src="images/logo.png" alt="IMG" width="100">
        </div>

            <span class="contact1-form-title" > <h2>Solicitud de empleo </h2></span>

        <!-- contact1-form   -->
        <form class="form-horizontal validate-form"  method="post" enctype="multipart/form-data" action="cargar.php">

				<span class="contact1-form-title">
                    <h4>Datos de la solicitud</h4>
				</span>

            <div class="wrap-input1 validate-input">
                <input class="input1" type="text" name="LOGIN" style="WIDTH: 270px; HEIGHT: 35px"
                       size=30 value=" <?php echo $_SESSION['LOGIN']; ?>" readonly>
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" >
                <input class="input1" type="text" name="NOMBRECOMPLETO" style="WIDTH: 210px; HEIGHT: 35px"
                       size=30 value=" <?php echo $_SESSION['NOMBRE']; ?>" readonly>
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Las Placas son requeridas">
                <input class="input1" type="text" name="MOTIVO" placeholder="Motivo Solicitud de Empleo" style="WIDTH: 210px; HEIGHT: 65px"
                       size=30>
                <span class="shadow-input1"></span>
            </div>


            <span class="contact1-form-title">
                <h4>Datos del Empleado</h4>
            </span>


            <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="9000000" />
            <h5 class="bg-white">Seleccione el archivo que da vida a la solicitud, (formato PDF).</h5>
                <input type="file" name="archivo"  class="form-c" accept="application/pdf"/>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-8">
                <br><input type="submit" value="Enviar" class="btn btn-success" name="Subirbtn"/>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
