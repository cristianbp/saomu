<?php
session_start();
require("connection.php");
?>

<html lang="es">

<head>
    <title>saomù</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
    <!-- Conection with jquery libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/signup.js"></script>
</head>

<body>
    <header class="header">
        <h1 class="header_title">saomù</h1>
        <img class="header_img" src="media/logn.svg" alt="header_img">
    </header>


    <div class="form_login">

        <div class="form_title">
            <h2>Ingresa</h2>
        </div>

        <div class="form_content">
            <form action="login.php" method="post">
                <div class="form_group">

                    <input type="text" id="username" name="username" required>
                    <input type="password" id="password" name="password" required>
                    <button class="show_pass" type="button">Mostrar</button><br>
                    <label class="form_remember" for="remember">
                        <input type="checkbox" id="remember" name="remember">
                        No me olvides
                    </label>
                    <a href="#" class="pass_remember">Forgot Password?</a><br>
                    <button type="submit" class="login_button">Ingresar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Error message in case of wrong username or password -->
    <div class="error-message">
        <?php
        if (isset($_GET['login']) && $_GET['login'] == "failed") {
            echo "Usuario o contraseña incorrecto, intente de nuevo.";
        }
        ?>
    </div>

    <div class="form_signup">
        <div class="validation-msg"></div>

        <div class="form_signup_title">
            <h2>Registrate</h2>
        </div>

        <div class="form_signup_content">
            <form action="submit.php" method="post">
                <input class="input" type="text" name="newUser" placeholder="Usuario"><br>
                <input class="input" type="text" name="newName" placeholder="Nombre">
                <input class="input" type="text" name="newLast" placeholder="Apellido"><br>
                <input class="input" type="number" name="newIdent" placeholder="Cédula">
                <input class="input" type="text" name="newEmail" placeholder="e-mail"><br>
                <input class="input" type="password" name="newPass1" placeholder="Contraseña">
                <input class="input" type="password" name="newPass2" placeholder="Repita la contraseña"><br>
                <input class="input" type="text" name="newArea" placeholder="Area">
                <input class="input" type="text" name="newPosition" placeholder="Cargo"><br>
                <button class="submit_button" name="create">Registrar</button>
            </form>
        </div>
    </div>

</body>

</html>