<?php
// Archivo: login.php
if (isset($_SESSION['usuario'])) {
    // Redirigir al dashboard u otra página protegida
    header('Location: dashboard.php');
    exit();
}
// Incluir el archivo de conexión a la base de datos
include 'config/conexion.php';

// Verificar si se ha enviado el formulario de inicio de sesión
if (isset($_POST['iniciarsesion'])) {
    // Obtener los valores del formulario
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Consulta SQL para verificar las credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$contraseña'";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Las credenciales son válidas, iniciar sesión
        session_start();
        $_SESSION['usuario'] = $usuario;
        // Redirigir al dashboard u otra página protegida
        header('Location: dashboard.php');
        exit();
    } else {
        // Las credenciales son inválidas, mostrar mensaje de error
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery U - Log in</title>
    <link rel="icon" href="./img/logo.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="login">
<br>



    <div class="login">
<form action="login.php" method="POST">
    
<div class="container">
<h1 class="login">Galery U</h1>
     <p class="alert alert-info"> inicia sesión</p>
        <span class="material-symbols-outlined">
            person
            </span>
        <input class="login"  type="text" name="usuario" placeholder="Ingrese su usuario">
        <span class="material-symbols-outlined">
lock
</span>
        <input class="register"  type="password" name="contraseña" placeholder="Ingrese su contraseña">
        <input class="btn btn-primary"type="submit" name="iniciarsesion" value="Iniciar sesion">

        <a class="btn btn-success" href="index.php">Pagina principal</a>
        <a class="btn btn-outline-dark" href="register.php">No posees cuenta?, registrate aqui</a>

    </div>

</form>

</div>

      



</body>
</html>