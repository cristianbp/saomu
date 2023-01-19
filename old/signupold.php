<html>

<head>
    <title>saomù | Registro de nuevos usuarios</title>
    <link rel="stylesheet" href="css/signup.css">
    <!-- Conection with jquery libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/signup.js"></script>
</head>
<!-- Message showed in case of error or success xd -->
<div class="validation-msg"></div>
<!-- Form -->
<div class="formstructure">
    <div class="signup">
        <h2 class="form-title">Registrate</h2>
        <div class="form-holder">
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
                <button class="submit-btn" name="create">Listo</button>
            </form>
        </div>
    </div>
</div>


<footer class="footer">
    <p>&copy saomù</p>
</footer>

</html>