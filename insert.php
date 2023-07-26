<?php

include "config/conexion.php";

$nombreimagen = $_POST["nombre"];
$descripcionimagen = $_POST["descripcion"];
$imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$sql = "INSERT INTO `imagenes` (nombre,	descripcion	, imagen) VALUES ('$nombreimagen','$descripcionimagen','$imagen')";

$resultado = $conexion -> query($sql);

if ($resultado){
  header('location:dashboard.php');
} else{

    echo "No se insertaron los datos";
}


?>