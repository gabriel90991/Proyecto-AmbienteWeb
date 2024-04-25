<?php

include_once 'conexion.php';
 function recoge($var, $m = ""){
if (!isset($_REQUEST[$var])){
    $tmp = (is_array($m)) ? [] : "";
} elseif (!is_array($_REQUEST[$var])){
    $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
}else {
    $tmp = $_REQUEST[$var];
    array_walk_recursive($tmp, function(&$valor){
        $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
    });
}
return $tmp;

}
//validacion de datos
$nombreTarjeta = recoge("nombreTarjeta");
$numeroTarjeta = recoge("numeroTarjeta");
$fecha = recoge("fecha");
$codigo = recoge("codigo");

$nombreTarjetaOk = false;
$numeroTarjetaOk = false;
$fechaOk = false;
$codigoOk = false;


$valido['success']=array('success'=>false, 'mensaje'=>"");


if ($nombreTarjeta == ""){
    $valido['success']= false;
    $valido['mensaje']= "Debe ingresar el nombre de tarjeta";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ\s]{5,40}$/",$nombreTarjeta)) {
    $valido['success']= false;
    $valido['mensaje']= "Formato de nombre es invalido";
} else {
    $valido['success']= true;
    $nombreTarjetaOk = true;
}

if ($numeroTarjeta == ""){
    $valido['success']= false;
    $valido['mensaje']= "Debe ingresar el numero de tarjeta";
} elseif (!is_numeric($numeroTarjeta)) {
    $valido['success']= false;
    $valido['mensaje']= "Formato de tarjeta invalido";
} else {
    $valido['success']= true;
    $numeroTarjetaOk = true;
}


if ($fecha == ""){
    $valido['success']= false;
    $valido['mensaje']= "Debe seleccionar la fecha de vencimiento de la tarjeta";
} else {
    $valido['success']= true;
    $fechaOk = true;
}

if ($codigo == ""){
    $valido['success']= false;
    $valido['mensaje']= "Debe ingresar el codigo de tarjeta";
} elseif (!is_numeric($codigo)) {
    $valido['success']= false;
    $valido['mensaje']= "Formato de codigo invalido";
} else {
    $valido['success']= true;
    $codigoOk = true;
}

echo json_encode($valido);

function InsertaDatos($nombreTarjeta, $numeroTarjeta, $fecha, $codigo) {
    global $conexion;
    $sql = "INSERT INTO pago (nombreTarjeta, numeroTarjeta, fecha, codigo) VALUES (?, ?, ?, ?)";

    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("ssss", $nombreTarjeta, $numeroTarjeta, $fecha, $codigo);

        if ($stmt->execute()) {
            return array('success' => true, 'mensaje' => "Datos insertados correctamente");
        } else {
            return array('success' => false, 'mensaje' => "Error al insertar los datos: " . $stmt->error);
        }
    } else {
        return array('success' => false, 'mensaje' => "Error al preparar la consulta: " . $conexion->error);
    }
}

// si todos los datos estan correctos, insertar en base de datos

if ($nombreTarjetaOk && $numeroTarjetaOk && $fechaOk && $codigoOk){
    include_once 'conexion/conexion.php';

    echo json_encode(InsertaDatos($nombreTarjeta, $numeroTarjeta, $fecha, $codigo));
    header("Location: ../gracias_compra.html");
    }else {
        // si no, envíe error
        $mensaje = $valido['mensaje'];
        header("Location: ../compra.php?respuesta=$mensaje");
    }
