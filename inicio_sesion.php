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
    <style>
        .bg{
            background-image: url(img/nombre.jpg);
            background-position: center center;
        }
    </style>
</head>
<body onload="checarSesion();">
    <header class="bg_animate">
        <section class="banner contenedor">
            <secrion class="banner_title" style="text-align: center;">
                <h2 > HikersCR</h2>
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
        <div class="container w-75  mt-5 rounded shadow">
            <div class="row align-items-stretch">
                <div class="col bg">

                </div>
                <div class="my-3">
                    <form action="procesar_registro.php" method="post">
                        <label for="nombre">Nombre:</label><br>
                        <input type="text" id="nombre" name="nombre"><br>
                        <label for="apellido">Apellido:</label><br>
                        <input type="text" id="apellido" name="apellido"><br>
                        <label for="correo">Correo:</label><br>
                        <input type="email" id="correo" name="correo"><br>
                        <label for="telefono">Teléfono:</label><br>
                        <input type="tel" id="telefono" name="telefono"><br>
                        <input type="submit" value="Registrarse">
                    </form>
                </div>
                <div class="my-3">
                    <span>No tienes cuenta? <a href="registro.html">Regístrate</a></span><br>
                </div>
            </div>
        </div>

        <div class="container mt-4">

            <div class="row">
            <?php
// se conecta a la base de datos 
 include_once 'conexion/conexion.php';
 $valido['success']=array('success'=>false, 'mensaje'=>"", 'nombre'=>"", 'correo'=>"");

 if($_POST){
   $correo=$_POST['email'];
   $contraseña=$_POST['contraseña'];

   //Estamos buscando si el usuario existe con un procedimiento almacenado
   $sql="call LOGIN('$correo','$contraseña');";
   $resultado=$conexion->query($sql);
   
   //Si existe va ser mayor que cero y si no existe es menor de cero 
   $n=$resultado->num_rows;
   if($n>0){
        $row=$resultado->fetch_array();
        $valido['success']=true;
        $valido['mensaje']="Bienvenido " .$row['nombre'];
        $valido['nombre']=$row['nombre'];
        $valido['correo']=$row['email'];
   }else{
      $valido['success']=false;
      $valido['mensaje']="No existe este usuario";
   }

 }else{
   $valido['success']=false;
   $valido['mensaje']="No se agrego su usuario";
 }
 echo json_encode($valido);

?>
        
        
        </div>
        <br>
        <footer style= "text-align: center;">
            <p>&copy; Copyright 2024</p>
        </footer>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/proyecto-Registrar.js"></script>
    </body>
</html>