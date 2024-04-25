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
    <?php

    function recoge($var, $m = "")
    {
        $tmp = is_array($m) ? [] : "";
        if (isset($_REQUEST[$var])) {
            if (!is_array($_REQUEST[$var]) && !is_array($m)) {
                $tmp = trim(htmlspecialchars($_REQUEST[$var]));
            } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
                $tmp = $_REQUEST[$var];
                array_walk_recursive($tmp, function (&$valor) {
                    $valor = trim(htmlspecialchars($valor));
                });
            }
        }
        return $tmp;
    }

    $nombre = recoge("nombre");
    $correo  = recoge("correo");
    $asunto = recoge("asunto");

    $nombreOk  = false;
    $correoOk = false;
    $asuntoOk = false;

    if ($nombre == "") {
        print "\n";
    } elseif (!preg_match("/[a-zA-Z]+/", $nombre)) {
        print "\n";
    } else {
        $nombreOk = true;
    }

    if ($correo == "") {
        print "\n";
    } elseif (!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+/", $correo)) {
        print "\n";
    } else {
        $correoOk = true;
    }

    if ($asunto == "") {
        print "\n";
    } elseif (!preg_match("/[a-zA-Z0-9]+/", $asunto)) {
        print "\n";
    } else {
        $asuntoOk = true;
    }

    ?>
    <div class="container w-75  mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col">
                <h2 class="fw-bold text-center py-4">GRACIAS POR SU CONSULTA</h2>
                <form action="#">
                    <div class="mb-4">
                        <?php 
                        if ($nombreOk && $correoOk && $asuntoOk) {
                            print "  <p style=text-align:center>Estimado/a <strong> $nombre </strong> con el correo <strong>$correo</strong> te contactaremos lo mas antes posible para responder tu consulta.</p>\n";
                            print "\n";
                        }else{
                            print "  <p style=text-align:center>Estimado/a no lleno un dato de manera correcta o no lleno ningun dato.</p>\n";
                            print "\n";
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
    //1. Establecer la conexión con el motor de base de datos y seleccionar la base de datos que vamos a utilizar
    $conexion = new mysqli('localhost', 'root', '1234', 'hikerscr');

    if ($conexion->connect_error != null) {
        echo "Ocurrió un error al establecer la conexión: {$conexion->connect_error}";
    }

    $sql="call INSERTAR_CONTACTO('{$_POST['nombre']}', '{$_POST['correo']}', '{$_POST['asunto']}')";
    //2. Ejecutar la consulta. (Ingresar datos)
    $conexion->query($sql);

    if ($conexion->error != '') {
        echo "Ocurrió un error al ejecutar la sentencia de inserción: {$conexion->connect_error}";
    }

    //3. Cerrar la conexión
    $conexion->close();
    ?>
    <footer style="text-align: center;">
        <p>&copy; Copyright 2024</p>
    </footer>

</body>
</html>