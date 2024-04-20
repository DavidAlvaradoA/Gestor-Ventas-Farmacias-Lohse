<?php
include('../../config.php');

$id_marca = $_POST['id_marca'];
$nombre_marca = $_POST['nombre_marca'];

    $sentencia = $pdo->prepare("UPDATE marca 
    SET nombre_marca=:nombre_marca
    WHERE id_marca=:id_marca");
    
    $sentencia->bindParam('nombre_marca', $nombre_marca);
    $sentencia->bindParam('id_marca', $id_marca);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Marca actualizada con Exito";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/marcas');
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar Marca";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/marcas/update_marca.php?id='.$id_marca);
    }



