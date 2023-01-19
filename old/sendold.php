<?php
session_start();
require("connection.php");
$username = $_SESSION["username"];
$msg = $_POST['msgArea'];
$sql = "INSERT INTO messages(username,content) VALUES('$username','$msg')";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("location:home.php?send=success");
} else {
    header("location:home.php?send=failed");
}
mysqli_close($conn);
?>

