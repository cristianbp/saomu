<?php
session_start();
require("connection.php");

$username = $_SESSION["username"];
$msg = $_POST['msgArea'];
$receiver = $_POST['receiver'];
$time = date("H:i:s");
$date = date("Y-m-d");

$sql = "INSERT INTO messages(username, recipient, content, time, date) VALUES('$username','$receiver','$msg', '$time', '$date')";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location:home.php?send=success");
} else {
    header("location:home.php?send=failed");
}
mysqli_close($conn);
?>
