<?php

include ('../../config.php');

$id_venta = $_GET['id_venta'];
$nro_venta = $_GET['nro_venta'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM ventas WHERE id_venta=:id_venta");

$sentencia->bindParam('id_venta', $id_venta); 

if($sentencia->execute()) {

    $sentencia2 = $pdo->prepare("DELETE FROM carrito WHERE nro_venta=:nro_venta");
    $sentencia2->bindParam('nro_venta', $nro_venta); 
    $sentencia2->execute();

    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Venta Eliminada con Exito";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-ventas/ventas";
    </script>
    <?php
} else {
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-ventas/ventas";
    </script>
    <?php
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar Venta";
    $_SESSION['icono'] = "error";
    $pdo->rollBack();

}
