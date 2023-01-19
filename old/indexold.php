<?php
session_start();
require("connection.php");
?>

<html lang="es">

<head>
    <title>saomù</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/index.js"></script>
</head>

<body>
    <header class="header">
        <h1 class="header__title">saomù</h1>
        <img class="header__img" src="media/logn.svg" alt="header__img">
    </header>

    <!-- Error message in case of wrong username or password -->
    <div class="error-message">
        <?php
        if (isset($_GET['login']) && $_GET['login'] == "failed") {
            echo "Usuario o contraseña incorrecto, intente de nuevo.";
        }
        ?>
    </div>

    <div class="main">

        <form class="login" action="login.php" method="post">
            <div class="form-group">
                <input class="username" type="text" id="username" name="username" placeholder="@Usuario"><br>
                <input class="password" type="password" id="password" name="password" placeholder="#Contraseña"><br><br>
                <button class="login-btn" type="submit" name="login">Ingresar</button>
            </div>
        </form>
        <div class="links">
            <a href="signup.php" name="signup">Registrar</a>
            <a href="forgot.php">Olvidé mi contraseña</a>
        </div>
    </div>
    <footer>
        <p>&copy saomù</p>
    </footer>
</body>

</html>
