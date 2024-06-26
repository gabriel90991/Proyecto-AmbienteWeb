<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Final</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animaciones.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php
if ($_GET) {
    ?>
    <script>       
Swal.fire({
        icon: 'error',
        title: 'ERROR',
        text: '<?php echo $_GET["respuesta"] ?>',
        footer: ''
      })</script>
    <?php
}
    ?>

<header class="bg_animate">
        <section class="banner contenedor">
            <secrion class="banner_title" style="text-align: center;">
                <h2 > HikersCR </h2>
            </secrion>
            <div class="banner_img">
                <img src="img/logo-decoracion.jpg" width="100">
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
                    <li class="nav-item"><a href="reservacion.php" class="nav-link">Reservaciones</a></l>
                    <li class="nav-item"><a href="Nosotros.html" class="nav-link">Quienes somos</a></li>
                    <li class="nav-item"><a href="contactenos.html" class="nav-link active">Contáctenos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br> 
    <div>
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0" style="text-align: right;">
            <li class="nav-item"><a href="inicio_sesion.html" class="btn btn-primary " style="text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg> Iniciar sesión</a> <button class="btn btn-danger " onclick="cerrarSesion()">Cerrar
                    Sesion</button></li><br>
    </div>
    <div class="container w-75  mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col">
                <h2 class="fw-bold text-center py-4">Realizar pago</h2>
                <form id="formCompra" action="conexion/insertaCompra.php" method="GET">
                    <div class="mb-4">
                        <label for="nombreTarjeta" class="form-label">Nombre tarjeta: </label>
                        <input type="text" class="form-control" name="nombreTarjeta" id="nombreTarjeta">
                    </div>
                    <div class="mb-4">
                        <label for="numeroTarjeta" class="form-label">Número tarjeta: </label>
                        <input type="text" class="form-control" name="numeroTarjeta" id="numeroTarjeta">
                    </div>
                    <div class="mb-4">
                        <label for="fecha" class="form-label">Fecha expiración: </label>
                        <input type="date" class="form-control" name="fecha" id="fecha">
                    </div>
                    <div class="mb-4">
                        <label for="codigo" class="form-label">Código seguridad: </label>
                        <input type="text" class="form-control" name="codigo" id="codigo">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Realizar pago</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <footer style="text-align: center;">
        <p>&copy; Copyright 2024</p>
    </footer>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/proyecto-Compra.js"></script>
</body>

</html>