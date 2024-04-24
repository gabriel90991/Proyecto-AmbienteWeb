<?php
// Se creo la conexion con la base de datos de dos maneras para facilitar el codigo en diferentes partes.
    $server='localhost';
    $user='root';
    $password='1234';
    $dataBase = "hikerscr";
    $conexion = mysqli_connect($server, $user, $password, $dataBase);

    if(!$conexion){
        echo "Ocurrió un error al establecer la conexión: " . mysqli_connect_error();
    }

    function Conecta(){
        $server = "localhost";
        $user = "root";
        $pass = "1234";
        $bd = "hikerscr";
        $conexion = mysqli_connect($server, $user, $pass, $bd);
    
        if($conexion){
            //echo "La conexion de la base de datos se ha hecho satisfactoriamente;
        }else {
            //echo "Ha ocurrido un error";
        }
    
        return $conexion;
    }
function Desconectar($conexion)
{
    //3. Cerrar la conexión
    mysqli_close($conexion);
}

?>