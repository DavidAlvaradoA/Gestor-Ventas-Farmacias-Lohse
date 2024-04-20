<?php

include('../../config.php');

$id_marca = $_POST['id_marca'];

    $sentencia = $pdo->prepare("DELETE FROM marca WHERE id_marca=:id_marca");
    $sentencia->bindParam('id_marca', $id_marca);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Marca eliminada con Exito";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/marcas');

} else {
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar Marca";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/marcas/delete_marca.php?id='.$id_marca);
}