<?php

include ('../../config.php');

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

$sentencia = $pdo->prepare("INSERT INTO compras
    (nro_compra, 
    fecha_compra,
    comprobante,
    precio_compra,
    cantidad,
    id_producto,
    id_proveedor,
    id_usuario,
    fecha_creacion)
VALUES 
    (:nro_compra,
    :fecha_compra,
    :comprobante,
    :ingreso_compra,
    :ingreso_stock,
    :id_producto,
    :id_proveedor,
    :id_usuario, 
    :fecha_creacion)");

$sentencia->bindParam('nro_compra', $nro_compra);
$sentencia->bindParam('fecha_compra', $fecha_compra);
$sentencia->bindParam('comprobante', $comprobante);
$sentencia->bindParam('ingreso_compra', $ingreso_compra);
$sentencia->bindParam('ingreso_stock', $cantidad);
$sentencia->bindParam('id_producto', $id_producto);
$sentencia->bindParam('id_proveedor', $id_proveedor);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->bindParam('fecha_creacion', $fechaHora);
 
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
    $_SESSION['mensaje'] = "Compra Registrada con Exito";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/compras";
    </script>
    <?php
} else {

    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error al registrar Compra";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/compras";
    </script>
    <?php
}
