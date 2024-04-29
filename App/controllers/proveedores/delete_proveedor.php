<?php

include('../../config.php');

$id_proveedor = $_GET['id_proveedor'];

    $sentencia = $pdo->prepare("DELETE FROM proveedores WHERE id_proveedor=:id_proveedor");
    $sentencia->bindParam('id_proveedor', $id_proveedor);

    if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Proveedor eliminado con Exito";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-administracion/proveedores";
        </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar Proveedor";
        $_SESSION['icono'] = "error";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-administracion/proveedores";
        </script>
        <?php
    }

