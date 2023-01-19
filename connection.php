<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saomu";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
     die("La conexión ha fallado: " . mysqli_connect_error());
}
echo "Conexión exitosa";
//mysqli_close($conn);
?>