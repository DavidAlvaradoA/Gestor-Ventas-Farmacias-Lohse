<?php

include ('../../config.php');

$id_compra = $_GET['id_compra'];
$nro_compra = $_GET['nro_compra'];
$fecha_compra = $_GET['fecha_compra'];
$comprobante = $_GET['comprobante'];
$ingreso_compra = $_GET['ingreso_compra'];
$cantidad = $_GET['ingreso_stock'];
$id_usuario = $_GET['id_usuario'];
$id_proveedor = $_GET['id_proveedor'];
$id_producto = $_GET['id_producto'];
$stock_total = $_GET['stock_total'];


$pdo->beginTransaction();

$sentencia = $pdo->prepare("UPDATE compras
SET nro_compra=:nro_compra, 
    fecha_compra=:fecha_compra,
    comprobante=:comprobante,
    precio_compra=:ingreso_compra,
    cantidad=:ingreso_stock,
    id_producto=:id_producto,
    id_proveedor=:id_proveedor,
    id_usuario=:id_usuario,
    fecha_actualizacion=:fecha_actualizacion
    WHERE id_compra=:id_compra");

$sentencia->bindParam('nro_compra', $nro_compra);
$sentencia->bindParam('fecha_compra', $fecha_compra);
$sentencia->bindParam('comprobante', $comprobante);
$sentencia->bindParam('ingreso_compra', $ingreso_compra);
$sentencia->bindParam('ingreso_stock', $cantidad);
$sentencia->bindParam('id_producto', $id_producto);
$sentencia->bindParam('id_proveedor', $id_proveedor);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('fecha_actualizacion', $fechaHora);
$sentencia->bindParam('id_compra', $id_compra); 

if($sentencia->execute()) {

    // Actualizar stock desde Compras

    $sentencia = $pdo->prepare("UPDATE inventario 
    SET stock_producto=:stock_producto
    WHERE id_producto= :id_producto");

    $sentencia->bindParam('stock_producto', $stock_total);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Compra actualizada con Exito";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/compras";
    </script>
    <?php
} else {

    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error al actualizar Compra";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/compras";
    </script>
    <?php
}
