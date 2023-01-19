<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saomu";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Recibir los datos del formulario de inicio de sesión
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar que el nombre de usuario existe en la base de datos
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
    // Verificar que la contraseña ingresada coincide con la almacenada en la base de datos
    if (password_verify($password, $hashed_password)) {
    // Inicio de sesión exitoso
    $_SESSION['username'] = $username;
    header("location:home.php?login=success");
    exit();
    } else {
    // Contraseña incorrecta
    header("location:index.php?login=failed&reason=password");
    exit();
    }
    } else {
    // Nombre de usuario no encontrado
    header("location:index.php?login=failed&reason=username");
    exit();
    }
    $stmt->close();
    $conn->close();
    } else {
    // Datos del formulario no recibidos
    header("location:index.php?login=failed&reason=missing-data");
    exit();
    }
    ?>
