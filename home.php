<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:index.php");
}
require("connection.php");
?>
<html lang="es">

<head>
    <title>saomù</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <div id="mainHome">
        <!-- User Info -->
        <div id="userInfo">
            <?php
            echo $_SESSION["username"];
            ?>
            <button id="darkModeBtn">Modo oscuro</button>
            <a href="logout.php">Cerrar Sesión</a>
        </div>

        <!-- User List -->
        <div id="userList">
            <?php
            $sql = "SELECT username FROM users";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<p><a href='#' class='user-select'>" . $row['username'] . "</a></p>";
            }
            ?>
        </div>

        <!-- Message Screen -->
        <div id="msgScreen">
            <?php
            $sql = "SELECT * FROM messages WHERE username = '" . $_SESSION["username"] . "'";
            $result = mysqli_query($conn, $sql);
            echo "<table border='1'>
        <tr>
        <th>username</th>
        <th>message</th>
        <th>recipient</th>
        <th>time</th>
        <th>date</th>
        </tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['content'] . "</td>";
                echo "<td>" . $row['recipient'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>

        <!-- Message Box -->
        <div id="msgBox">
        <form method="post" action="send.php">
                <input name="msgArea" type="text" placeholder="Escribe tu mensaje">
                <input type="hidden" name="receiver" id="receiver" value="">
                <button type="submit">Enviar</button>
            </form>
        </div>
        </div>
<script>
    var darkModeBtn = document.getElementById("darkModeBtn");
    darkModeBtn.addEventListener("click", function() {
    document.body.classList.toggle("dark-mode");
    });
    var userLinks = document.getElementsByClassName("user-select");
    for (var i = 0; i < userLinks.length; i++) {
        userLinks[i].addEventListener("click", function(event) {
event.preventDefault();
document.getElementById("receiver").value = event.target.text;
});
}
</script>

</body>
</html>