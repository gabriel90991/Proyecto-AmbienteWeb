<?php
// se conecta a la base de datos 
 require_once 'conexion/conexion.php';
 $valido['success']=array('success'=>false, 'mensaje'=>"", 'nombre'=>"", 'correo'=>"");

 if($_POST){
   $correo=$_POST['email'];
   $contrasena=$_POST['contrasena'];

   //Estamos buscando si el usuario existe con un procedimiento almacenado
   $sql="call LOGIN('$correo','$contrasena');";
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