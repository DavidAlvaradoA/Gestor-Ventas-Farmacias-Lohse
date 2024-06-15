<?php

include ('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_cliente = $_GET['id_cliente'];
$monto_venta = $_GET['monto_venta'];



$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO ventas
    (nro_venta, 
    id_cliente,
    total_pagado,
    fecha_creacion)
VALUES 
    (:nro_venta,
    :id_cliente,
    :total_pagado,
    :fecha_creacion)");

$sentencia->bindParam('nro_venta', $nro_venta);
$sentencia->bindParam('id_cliente', $id_cliente);
$sentencia->bindParam('total_pagado', $monto_venta);
$sentencia->bindParam('fecha_creacion', $fechaHora);
 
if($sentencia->execute()) {

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Venta Registrada con Exito";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-ventas/ventas/create.php";
    </script>
    <?php
} else {
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-ventas/ventas/create.php";
    </script>
    <?php
    session_start();
    $_SESSION['mensaje'] = "Error al registrar Venta";
    $_SESSION['icono'] = "error";
    $pdo->rollBack();

}
