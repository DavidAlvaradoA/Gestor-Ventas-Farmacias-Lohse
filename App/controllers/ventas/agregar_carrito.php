<?php

include ('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_producto = $_GET['id_producto'];
$cantidad = $_GET['cantidad'];



$sentencia = $pdo->prepare("INSERT INTO carrito
    (nro_venta, 
    id_producto,
    cantidad,
    fecha_creacion)
VALUES 
    (:nro_venta,
    :id_producto, 
    :cantidad,
    :fecha_creacion)");

$sentencia->bindParam('nro_venta', $nro_venta);
$sentencia->bindParam('id_producto', $id_producto);
$sentencia->bindParam('cantidad', $cantidad);
$sentencia->bindParam('fecha_creacion', $fechaHora);
 
if($sentencia->execute()) {
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-ventas/ventas/create.php";
    </script>
    <?php
} else {

    session_start();
    $_SESSION['mensaje'] = "Error al registrar Compra";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-ventas/create.php";
    </script>
    <?php
}
