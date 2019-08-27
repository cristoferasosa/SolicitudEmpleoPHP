<?php
include "../conexionbd.php";
$query = "SELECT * FROM dbpaginasweb.tb_solicitud";
$result = mysqli_query(conecta(),$query);

echo "<center><h2>Informacion Almacenada en la Base de Datos</h2></center>";
echo "<table border='5' bgcolor='#f8f8ff'>";

echo "<tr>";
echo "<td>ID SOLICITUD</td>";
echo "<td>NOMBRE</td>";
echo "<td>CORREO</td>";
echo "<td>RUTAPDF</td>";
echo "<td>NOMBREARCHIVO</td>";
echo "<td>MOTIVO</td>";
echo "<td>VER ARCHIVO</td>";
echo "</tr>";


$reg = mysqli_fetch_array($result);
while ($reg){
    echo "<tr>";
    echo "<td>".$reg[0]."</td>";
    echo "<td>".$reg[1]."</td>";
    echo "<td>".$reg[2]."</td>";
    echo "<td>".$reg[3]."</td>";
    echo "<td>".$reg[4]."</td>";
    echo "<td>".$reg[5]."</td>";

    $nombre = $reg[3].$reg[4];
    echo "<td><a href='mostrarCV.php?nombre=$nombre&n=$reg[4]'>Mostrar</a></td>";
    $reg = mysqli_fetch_array($result);
    echo "</tr>";
}
echo "</table>";
mysqli_close(conecta());

echo <<<HTML
<div class="form-control">
    <u><a href="../solicitud.php" ><strong>REGRESAR A LA PAGINA ANTERIOR</strong></a></u>
</div>
HTML;

?>