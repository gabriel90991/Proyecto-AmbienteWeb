<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HikersCR - Página de inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animaciones.css">
</head>
<body>
    <header class="bg_animate">
        <section class="banner contenedor">
            <section class="banner_title" style="text-align: center;">
                <h2> HikersCR </h2>
            </section>
            <div class="banner_img">
                <img src="img/nombre.jpg" width="100">
            </div>
        </section>
        <div class="burbujas">
            <!-- Resto del código HTML -->
        </div>
    </header>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenido/a a nuestra Tienda</h1>

<?php
session_start();
include 'conexion/conexion.php';

$nombre = $_POST['nombre'];

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$conexion = Conecta();
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

// Encripta la contraseña antes de guardarla en la base de datos
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (Nombre, Correo, Contrasena) VALUES ('$nombre', '$correo', '$contrasena_encriptada')";

if (mysqli_query($conexion, $sql)) {
    // Obtén el ID del usuario que acaba de registrarse
    $usuarioID = mysqli_insert_id($conexion);
    $_SESSION['nombre'] = $nombre;
    $_SESSION['usuarioID'] = $usuarioID; // Guarda el ID del usuario en la sesión
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

Desconectar($conexion);
?>

<div class="d-grid gap-2 col-6 mx-auto">
            <a href="home.php" class="btn btn-primary btn-lg" role="button">Entrar al sitio</a>
        </div>
    </div>

    <footer style= "text-align: center;">
        <p>&copy; Copyright 2024</p>
    </footer>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/proyecto-Registrar.js"></script>
</body>
</html>