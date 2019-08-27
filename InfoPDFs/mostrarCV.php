<?php
include "usuarios.php";
include "cargar.php";

        $name = $_GET['nombre'];
        $n=$_GET['n'];
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $n . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo file_get_contents($name);

?>