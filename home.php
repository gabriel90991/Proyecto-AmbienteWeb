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
            <secrion class="banner_title" style="text-align: center;">
                <h2 > HikersCR </h2>
            </secrion>
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
                    include 'conexion/conexion.php';
                    $conexion = Conecta();
                    if (!$conexion) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT Nombre FROM usuarios";
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
                        </div>
                        <div class="carousel-item">
                            <img src="anuncio2.jpg" class="d-block w-100" alt="Anuncio 2">
                        </div>
                        <div class="carousel-item">
                            <img src="anuncio3.jpg" class="d-block w-100" alt="Anuncio 3">
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
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <h4>Producto 1</h4>
                <p>Descripción del producto 1</p>
            </div>
            <div class="col-md-3">
                <h4>Producto 2</h4>
                <p>Descripción del producto 2</p>
            </div>
            <div class="col-md-3">
                <h4>Producto 3</h4>
                <p>Descripción del producto 3</p>
            </div>
            <div class="col-md-3">
                <h4>Producto 4</h4>
                <p>Descripción del producto 4</p>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>

 