<?php

include "config/conexion.php";

$message = '';

if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (usuario, password, email) VALUES (?, ?, ?)";

    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("sss", $username, $password, $email);

    $message = ($stmt->execute()) ? "Usuario registrado con éxito" : "Error: " . $sql . "<br>" . $conexion->error;

    $stmt->close();
    $conexion->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery U - Register</title>
    <link rel="icon" href="./img/logo.ico">
    <link rel="stylesheet" href="./styles.css">

    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="register">

<?php if (!empty($message)): ?>
<br>

<div class="container">
<div class="alert alert-primary " role="alert">
<?php echo $message; ?>
</div>  

</div>

    
       
    <?php endif; ?>



    <div class="container">

        <form action="register.php" method="POST">

            <div class="registercon">
                <h1 class="login">Galery U</h1>

                <p class="alert alert-info"> registrate</p>
                <span class="material-symbols-outlined">

                    <input class="registercon" name="username" type="text" placeholder="Ingrese nombre de usuario">

                    <input class="registercon" name="email" type="email" placeholder="Ingrese correo electronico">

                    <input class="registercon" name="password" type="password" placeholder="Ingrese su contraseña">

                    <input class="btn btn-primary" type="submit" value="Registrate">

                    <a class="btn btn-success" href="login.php"> ya tienes cuenta?, inicia sesion</a>

                    <a class="btn btn-secondary" href="index.php"> Pagina principal</a>

            </div>

        </form>



    </div>




</body>

</html>