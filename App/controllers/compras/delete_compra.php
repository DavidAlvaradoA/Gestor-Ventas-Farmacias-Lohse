<?php

include ('../../config.php');

$id_compra = $_GET['id_compra'];
$id_producto = $_GET['id_producto'];
$cantidad_compra = $_GET['cantidad_compra'];
$stock_actual = $_GET['stock_actual'];


$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM compras WHERE id_compra=:id_compra");

$sentencia->bindParam('id_compra', $id_compra); 

if($sentencia->execute()) {

    // Eliminar stock desde Compras
    $stock = $stock_actual - $cantidad_compra;
    $sentencia = $pdo->prepare("UPDATE inventario 
    SET stock_producto=:stock_producto
    WHERE id_producto= :id_producto");

    $sentencia->bindParam('stock_producto', $stock);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Compra Eliminada con Exito";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-administracion/compras";
    </script>
    <?php
} else {

    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error al eliminar Compra";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-administracion/compras";
    </script>
    <?php
}
