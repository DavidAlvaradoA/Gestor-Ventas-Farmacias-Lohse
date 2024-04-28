<?php

include('../../config.php');

$id_producto = $_POST['id_producto'];

    $sentencia = $pdo->prepare("DELETE FROM inventario WHERE id_producto=:id_producto");
    $sentencia->bindParam('id_producto', $id_producto);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Producto eliminado con Exito";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/views/inventario');

} else {
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar Producto";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/views/inventario/delete.php?id='.$id_producto);
}