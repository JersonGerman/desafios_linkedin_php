<?php
$email = "";
$username = "";
$password = "";
$passwordRepeat = "";
$errors = null;


if (isset($_POST["email"]) && 
    isset($_POST["username"]) &&
    isset($_POST["password"]) &&
    isset($_POST["password-repeat"])
    ) {

    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];
    $errors = null;
    if ($username == "" || $password == "" || $email == "" || $passwordRepeat == "") {
        $errors = "complete todos los campos";
    }
    if($password != $passwordRepeat){
        $errors = "las contraseñas no coinciden";
        $password = "";
        $passwordRepeat = "";
    }
    if($errors == null){
        require_once '../controllers/conexion.php';
        $db = new DBConnection();
        $cn = $db->cn;
        $query = "SELECT * FROM usuarios WHERE usuario = '$username'";
        $result = $cn->query($query);
        if($result->num_rows > 0){
            $errors = "El usuario ya existe";
        }else{
            $query = "INSERT INTO usuarios (email, usuario, contrasenia) VALUES ('$email', '$username', '$password')";
            $result = $cn->query($query);
            header('location: login.php');
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
            <h3>Registrarse</h3>
            <form action="register.php" method="POST">
                <div>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="<?=$email?>" autocomplete="email" required>
                </div>
                <div>
                    <label for="username">Usuario</label>
                    <input id="username" name="username" type="text" value="<?=$username?>" autocomplete="username" required>
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input id="password" name="password" type="password" value="<?=$password?>"  autocomplete="new-password" required>
                </div>
                <div>
                    <label for="password-repeat">Repetir Contraseña</label>
                    <input id="password" name="password-repeat" type="password" value="<?=$passwordRepeat?>"  autocomplete="new-password" required>
                </div>
                <input type="submit" value="Crear nueva cuenta">
                <span><?= isset($errors) ? $errors : ""  ?></span>
                
            </form>
            <div class="other">
                <a href="./login.php">volver</a>
            </div>
        </div>
    </div>
</body>

</html>