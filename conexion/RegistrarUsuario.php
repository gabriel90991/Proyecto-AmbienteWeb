<?php
//Se conecta a la base de datos 
 require_once 'conexion/conexion.php';

 $valido['success']=array('success'=>false, 'mensaje'=>"");

 if($_POST){
   $correo=$_POST['email'];
   $contrasena=$_POST['contrasena'];
   $nombre=$_POST['nombre'];

   // Por medio de un procedimiento almacenado verifica si existe el correo si es asi no lo deja continuar ya que 
   // solo se puede un correo por usuario.
   $sql="call VER_USUARIOS('$correo')";
   $resultado=$conexion->query($sql);
   
   //Para poder continuar con el registro deben ningun usuario debe tener ese correo 
   $n=$resultado->num_rows;
   if($n==0){
      $sqlInsertar="INSERT INTO usuario VALUES(null,'$nombre','$correo','$contrasena')";
      if($conexion->query($sqlInsertar)===true){
         $valido['success']=true;
         $valido['mensaje']="Se guardo correctamente";
      }else{
         $valido['success']=false;
         $valido['mensaje']="ERROR: No se guardo el usuario";
      }
   }else{
      $valido['success']=false;
      $valido['mensaje']="El correo ya esta en uso";
   }
 }else{
   $valido['success']=false;
   $valido['mensaje']="No se agrego su usuario";
 }
 echo json_encode($valido);

?>