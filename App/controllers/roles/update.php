<?php
include('../../config.php');

$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];

    $sentencia = $pdo->prepare("UPDATE roles 
    SET rol=:rol,
        fecha_actualizacion=:fecha_actualizacion
    WHERE id_rol=:id_rol");
    
    $sentencia->bindParam('rol', $rol);
    $sentencia->bindParam('fecha_actualizacion', $fechaHora);
    $sentencia->bindParam('id_rol', $id_rol);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Rol actualizado con Exito";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/views/roles/');
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar rol";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/views/roles/update.php?id='.$id_rol);
    }




 