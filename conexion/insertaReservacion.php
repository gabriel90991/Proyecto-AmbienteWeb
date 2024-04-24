<?php
//validacion de datos
function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

$TourID = recoge("TourID");
$Fecha = recoge("Fecha");
$Telefono = recoge("Telefono");


$TourIDOk = false;
$FechaOk = false;
$TelefonoOk = false;


$valido['success'] = array('success' => false, 'mensaje' => "");

if ($TourID == "") {
    $valido['success'] = false;
    $valido['mensaje'] = "Debe ingresar el numero de tour que quiere realizar";
} else {
    $valido['success'] = true;
    $TourIDOk = true;
}

if ($Fecha == "") {
    $valido['success'] = false;
    $valido['mensaje'] = "Debe ingresar la fecha de su reservación";
} else {
    $valido['success'] = true;
    $FechaOk = true;
}

if ($Telefono == "") {
    $valido['success'] = false;
    $valido['mensaje'] = "Debe seleccionar un teléfono como contacto de respaldo";
} elseif (!is_numeric($Telefono)) {
    $valido['success'] = false;
    $valido['mensaje'] = "Formato de teléfono invalido";
} else {
    $valido['success'] = true;
    $TelefonoOk = true;
}



echo json_encode($valido);

// si todos los datos estan correctos, insertar en base de datos

if ($TourIDOk && $FechaOk && $TelefonoOk){
    include 'conexion/conexion.php';

    echo json_encode(InsertaDatosR($fecha, $hora, $telefono, $servicio));
    header("Location: ../compra.php");
    }else {
        // si no, envíe error
        $mensaje = $valido['mensaje'];
        header("Location: ../reservacion.php?respuesta=$mensaje");
    }
