<?php
session_start();

// Verificar si no hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Modificar Imagen</title>

  
<script>
    function validarFormulario() {
        var nombreImagen = document.forms["editarimagen"]["nombreImagen"].value.trim();
        var descripcionImagen = document.forms["editarimagen"]["descripcionImagen"].value.trim();
        var imagenEdit = document.forms["editarimagen"]["imagenEdit"].files.length;

        if (nombreImagen == "" || descripcionImagen == "" || imagenEdit == 0) {
            alert("Por favor, complete todos los campos.");
            return false;
        }
    }
</script>

</head>

<body>

    <?php
    include "config/conexion.php";

    $Id = $_REQUEST['ID'];

    $sql = " SELECT * FROM imagenes WHERE ID = $Id ";
    $resultado = $conexion->query($sql);

    $fila = $resultado->fetch_assoc();

    ?>

    <div class="container">
        <br>
        <center>
            <h1>Modificar Imagen</h1>
        </center>

        <form action="editarimagen.php?IdEditar=<?php echo $fila['ID']?>" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombreImagen" value="<?php echo $fila['nombre'] ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcionImagen" value="<?php echo $fila['descripcion'] ?>">
    </div>

    <td><img style="width: 300px;" src="data:image/jpg;base64,<?php echo base64_encode($fila['imagen'])?>" alt=""></td>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Imagen</label>
        <input type="file" class="form-control" name="imagenEdit">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="dashboard.php" class="btn btn-success">Regresar al dashboard</a>
</form>


    </div>

 

</body>

</html>