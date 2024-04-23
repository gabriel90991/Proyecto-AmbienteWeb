<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - Página de inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animaciones.css">
</head>
<body>
    <header class="bg_animate">
        <section class="banner contenedor">
            <secrion class="banner_title" style="text-align: center;">
                <h2 > HikersCR </h2>
            </section>
            <div class="banner_img">
                <img src="img/nombre.jpg" width="100">
            </div>
        </section>
        <div class="burbujas">
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
        </div>
    </header>

    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #23BAC4;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="productos.php" class="nav-link">Productos</a></li>
                    <li class="nav-item"><a href="reservacion.php" class="nav-link">Reservaciones</a></l>
                    <li class="nav-item"><a href="quienes_somos.html" class="nav-link">Quienes somos</a></li>
                    <li class="nav-item"><a href="contactenos.html" class="nav-link active">Contáctenos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h1>Bienvenido a HikersCR</h1>
                <?php
                    session_start();
                    include_once 'conexion/conexion.php';
                    $conexion = Conecta();
                    if (!$conexion) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $usuarioID = $_SESSION['usuarioID']; // Asume que $_SESSION['usuarioID'] contiene el ID del usuario que ha iniciado sesión
                    $sql = "SELECT Nombre FROM usuarios WHERE UsuarioID = '$usuarioID'";
                    $result = mysqli_query($conexion, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<p>Bienvenido, " . $row["Nombre"] . "!</p>";
                        }
                    } else {
                        echo "0 results";
                    }
                    Desconectar($conexion);
                ?>
                <p>¡La mejor tienda de hiking en Costa Rica!</p>
                <p>Ofrecemos una amplia selección de equipos y accesorios para tus aventuras al aire libre.</p>
            </div>
            <div class="col-md-4">
                <h4>Anuncios</h4>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="anuncio1.jpg" class="d-block w-100" alt="Anuncio 1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Título del Anuncio 1</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="anuncio2.jpg" class="d-block w-100" alt="Anuncio 2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Título del Anuncio 2</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="anuncio3.jpg" class="d-block w-100" alt="Anuncio 3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Título del Anuncio 3</h5>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>

            <div class="container mt-4">

    <div class="row">
    <?php
include_once 'conexion/conexion.php';
$conexion = Conecta();
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT t.TourID, t.Nombre, t.Descripcion, t.Duracion, t.Dificultad, t.Precio, t.Ubicacion, c.Nombre AS Categoria 
        FROM tours t 
        INNER JOIN `categoria tours` c ON t.CategoriaID = c.CategoriaID";
$result = mysqli_query($conexion, $sql);
$tours = [];
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $tours[] = $row;
    }
} else {
    echo "No hay tours disponibles.";
}
Desconectar($conexion);

foreach ($tours as $tour) {
    echo '<div class="col-md-3">';
    echo '<h4>' . $tour["Nombre"] . '</h4>';
    echo '<p>' . $tour["Descripcion"] . '</p>';
    echo '<p>Duración: ' . $tour["Duracion"] . '</p>';
    echo '<p>Dificultad: ' . $tour["Dificultad"] . '</p>';
    echo '<p>Precio: ' . $tour["Precio"] . '</p>';
    echo '<p>Ubicación: ' . $tour["Ubicacion"] . '</p>';
    echo '<p>Categoría: ' . $tour["Categoria"] . '</p>';
    echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservaModal' . $tour["TourID"] . '">Reservar</button>';
    echo '</div>';
}

foreach ($tours as $tour) {
    echo '<div class="modal fade" id="reservaModal' . $tour["TourID"] . '" tabindex="-1" role="dialog" aria-labelledby="reservaModalLabel' . $tour["TourID"] . '" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservaModalLabel' . $tour["TourID"] . '">Reservar Tour</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="reservar_tour.php" method="post">
                        <input type="hidden" name="tourID" value="' . $tour["TourID"] . '">
                        <input type="hidden" name="usuarioID" value="' . $_SESSION['usuarioID'] . '">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required>
                        </div>
                        <div class="form-group">
                            <label for="numero_participantes">Número de Participantes</label>
                            <input type="number" class="form-control" id="numero_participantes" name="numero_participantes" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>';
}
?>


</div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>

 