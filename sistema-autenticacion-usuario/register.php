<?php

if (isset($_POST["email"]) && 
    isset($_POST["username"]) &&
    isset($_POST["password"]) &&
    isset($_POST["password-repeat"])
    ) {

    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $errors = null;
    if ($username == "" || $password == "" || $email == ""){
        $errors = "datos incorrectos";
    };

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="container-form">
            <h3>Registrarse</h3>
            <form action="register.php" method="POST">
                <div>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required>
                </div>
                <div>
                    <label for="username">Usuario</label>
                    <input id="username" name="username" type="text" autocomplete="username" required>
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input id="password" name="password" type="password"  autocomplete="new-password" required>
                </div>
                <div>
                    <label for="password-repeat">Repetir Contraseña</label>
                    <input id="password" name="password-repeat" type="password"  autocomplete="new-password" required>
                </div>
                <input type="submit" value="Crear nueva cuenta">
                <span><?= isset($errors) ? $errors : ""  ?></span>
                
            </form>
            <div class="other">
                <a href="./">volver</a>
            </div>
        </div>
    </div>
</body>

</html>