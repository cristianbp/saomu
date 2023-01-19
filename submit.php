<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saomu";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$newIdent = $_POST['newIdent'];
$newUser = $_POST['newUser'];
$newName = $_POST['newName'];
$newLast = $_POST['newLast'];
$newEmail = $_POST['newEmail'];
$newPass1 = $_POST['newPass1'];
$newPass2 = $_POST['newPass2'];
$newPosition = $_POST['newPosition'];
$newArea = $_POST['newArea'];

// Validate passwords match
if ($newPass1 !== $newPass2) {
    $validation_msg = 'Las contraseñas no coinciden. Por favor valida las contraseñas.';
    echo json_encode(['status' => 'error', 'validation_msg' => $validation_msg]);
    exit();
}

// Validate email format
if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    $validation_msg = 'Formato de email inválido.';
    echo json_encode(['status' => 'error', 'validation_msg' => $validation_msg]);
    exit();
}

// Hash the password
$hashed_password = password_hash($newPass1, PASSWORD_BCRYPT);

// Check if identification already exists in the database
$stmt = $conn->prepare("SELECT * FROM users WHERE identification = ?");
$stmt->bind_param("s", $newIdent);
$stmt->execute();
$result = $stmt->get_result();
if (mysqli_num_rows($result) > 0) {
    $validation_msg = 'Ya existe un usuario con esta identificación.';
    echo json_encode(['status' => 'error', 'validation_msg' => $validation_msg]);
    exit();
}

// Check if username already exists in the database
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $newUser);
$stmt->execute();
$result = $stmt->get_result();
if (mysqli_num_rows($result) > 0) {
    $validation_msg = 'El nombre de usuario ya esta en uso. Por favor elija otro.';
    echo json_encode(['status' => 'error', 'validation_msg' => $validation_msg]);
    exit();
}

// Insert new user into the database
$stmt = $conn->prepare("INSERT INTO users (identification, first_name, last_name, email, username, area, position, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $newIdent, $newName, $newLast, $newEmail, $newUser, $newArea, $newPosition, $hashed_password);
if ($stmt->execute()) {
echo json_encode(['status' => 'success']);
} else {
echo json_encode(['status' => 'error', 'validation_msg' => 'Error al insertar el usuario en la base de datos.']);
}

$stmt->close();
$conn->close();
