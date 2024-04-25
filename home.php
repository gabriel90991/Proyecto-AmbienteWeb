<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animaciones.css">
</head>
<body>  
    <header class="bg_animate">
        <section class="banner contenedor">
            <secrion class="banner_title" style="text-align: center;">
                <h2 > HikersCR </h2>
            </secrion>
          
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h1>Bienvenido a HikersCR</h1>
                
                <p>¡La mejor tienda de hiking en Costa Rica!</p>
                <p>Ofrecemos una amplia selección tours para tus aventuras al aire libre. Con nosotros, podrás llevar al límite o liberar ese espíritu aventurero, conociendo 
                    los diferentes lugares que tenemos en nuestro país y a disposición de aquellos que 
                    desean poder conectar con la naturaleza.
                </p>
            </div>
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
    <div class="container">
        <div class="row">
            <br>
            <h3>Productos</h3>
            <div class="col-4">
                <div class="card">
                    <img src="images/VolcanRV.jpg" alt="Imagen de Rincon" class="card-img-top" height="300">
                    <div class="card-body">
                    <h5 class="card-title">
                    Sendero Rincón de la Vieja
                    <span class="badge bg-success">Nuevo</span>
                    <span class="badge bg-info">Difícil</span>
                    </h5>
                        <p class="card-text">Precio: $15 por persona </p>
                        <p class="card-text">Duración: 4 horas </p>
                        <p class="card-text">Ubicación: Parque Nacional Rincón de la Vieja </p>
                        <p class="card-text">Dificultad: Moderada </p>

                        <button type="button" class="btn btn-primary btn-lg"><a href="reservacion.php"    
                            style="color: white; text-decoration: none;">Reservar</a></button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="images/Chirripo.jpg" alt="Imagen de Chirripo" class="card-img-top" height="300">
                    <div class="card-body">
                    <h5 class="card-title">
                    Caminata al Parque Nacional Cerro Chirripó
                    <span class="badge bg-info">Difícil</span>
                    </h5>
                        <p class="card-text">Precio: $25 por persona </p>
                        <p class="card-text">Duración: 2 días </p>
                        <p class="card-text">Ubicación: Parque Nacional Cerro Chirripó </p>
                        <p class="card-text">Dificultad: Alta </p>
                        <button type="button" class="btn btn-primary btn-lg"><a href="reservacion.php"
                            style="color: white; text-decoration: none;">Reservar</a></button>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="images/Quetzales.jpg" alt="Imagen Los Quetzales" class="card-img-top" height="300">
                    <div class="card-body">
                    <h5 class="card-title">
                    Sendero de los Quetzales en Monteverde
                    <span class="badge bg-success">Nuevo</span>
                    </h5>
                        <p class="card-text">Precio: $20 por persona </p>
                        <p class="card-text">Duración: 3 horas </p>
                        <p class="card-text">Ubicación: Reserva Biológica Monteverde </p>
                        <p class="card-text">Dificultad: Moderada </p>
                        <button type="button" class="btn btn-primary btn-lg"><a href="reservacion.php"
                                style="color: white; text-decoration: none;">Reservar</a></button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="images/Arenal.jpg" alt="Imagen de Arenal" class="card-img-top" height="300">
                    <div class="card-body">
                    <h5 class="card-title">
                    Caminata al Volcán Arenal
                    <span class="badge bg-info">Difícil</span>
                    </h5>
                        <p class="card-text">Precio: $30 por persona </p>
                        <p class="card-text">Duración: 5 horas </p>
                        <p class="card-text">Ubicación: Parque Nacional Volcán Arenal </p>
                        <p class="card-text">Dificultad: Moderada </p>
                        <button type="button" class="btn btn-primary btn-lg"><a href="reservacion.php"
                                style="color: white; text-decoration: none;">Reservar</a></button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="images/Nauyaca.jpg" alt="Imagen de Nauyaca" class="card-img-top" height="300">
                    <div class="card-body">
                    <h5 class="card-title">
                    Catarata Nauyaca en Dominical
                    <span class="badge bg-primary">Fácil</span>
                    </h5>
                        <p class="card-text">Precio: $10 por persona </p>
                        <p class="card-text">Duración: 2 horas </p>
                        <p class="card-text">Ubicación: Cascadas Nauyaca, Dominical </p>
                        <p class="card-text">Dificultad: Fácil </p>
                        <button type="button" class="btn btn-primary btn-lg"><a href="reservacion.php"
                                style="color: white; text-decoration: none;">Reservar</a></button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="images/IslaMurcielago.jpg" alt="Imagen de Islas Murcielago" class="card-img-top" height="300">
                    <div class="card-body">
                    <h5 class="card-title">
                    Achipiélago Islas murciélago
                    <span class="badge bg-success">Nuevo</span>
                    <span class="badge bg-primary">Fácil</span>
                    </h5>
                        <p class="card-text">Precio: $60 por persona </p>
                        <p class="card-text">Duración: 6 horas </p>
                        <p class="card-text">Ubicación: Península de Santa Elena </p>
                        <p class="card-text">Dificultad: Fácil </p>
                        <button type="button" class="btn btn-primary btn-lg"><a href="reservacion.php"
                                style="color: white; text-decoration: none;">Reservar</a></button>
                    </div>
                </div>
            </div>  
        </div>
    </div>

            <div class="container mt-4">

    <div class="row">

</div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>

 