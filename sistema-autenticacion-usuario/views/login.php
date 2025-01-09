<?php

if (isset($_POST["username"]) && isset($_POST["password"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $errors = null;
    if ($username == "" || $password == ""){
        $errors = "usuario o contraseña incorrecto";
    };

    if ($errors == null){
        require_once '../controllers/LoginController.php';
        $loginController = new LoginController();
        $isAuthenticate = $loginController->login($username, $password);
        if ($isAuthenticate){
            session_start();
            $_SESSION['isAuthenticate'] = true;
            return header('location: index.php');
        }else{
            $errors = "usuario o contraseña incorrecto";
        }
    }
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
            <h3>Iniciar Sesión</h3>
            <form action="login.php" method="POST">
                <div>
                    <label for="username">Usuario</label>
                    <input id="username" name="username" type="text" autocomplete="username" required>
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input id="password" name="password" type="password"  autocomplete="current-password" required>
                </div>
                <input type="submit" value="Iniciar Sesión">
                <span><?= isset($errors) ? $errors : ""  ?></span>
                
            </form>
            <div class="other">
                <a href="#">Contraseña olvidada</a>
                <a href="./register.php">Crear cuenta</a>
            </div>
        </div>
    </div>
</body>

</html>