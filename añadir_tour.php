<?php
include_once 'conexion/conexion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];
$dificultad = $_POST['dificultad'];
$precio = $_POST['precio'];
$ubicacion = $_POST['ubicacion'];
$categoria = $_POST['categoria']; // Asegúrate de que estás recogiendo el valor de la categoría

$conexion = Conecta();

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tours (Nombre, Descripcion, Duracion, Dificultad, Precio, Ubicacion, CategoriaID) 
        VALUES ('$nombre', '$descripcion', '$duracion', '$dificultad', '$precio', '$ubicacion', '$categoria')"; // Asegúrate de que estás insertando el valor de la categoría

if (mysqli_query($conexion, $sql)) {
    echo "Nuevo tour añadido con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

Desconectar($conexion);

header('Location: home.php'); // Redirige al usuario a la página de inicio
?>