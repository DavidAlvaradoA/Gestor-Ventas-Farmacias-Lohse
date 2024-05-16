<?php

include ('../../config.php');

$id_producto = $_GET['id_producto'];
$stock_total_venta = $_GET['stock_total_venta'];


$sentencia = $pdo->prepare("UPDATE inventario
SET stock_producto=:stock_producto
    WHERE id_producto=:id_producto");

$sentencia->bindParam('stock_producto', $stock_total_venta);
$sentencia->bindParam('id_producto', $id_producto);

if($sentencia->execute()) {

} else {

}
