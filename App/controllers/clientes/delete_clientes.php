<?php

include('../../config.php');

$id_cliente = $_GET['id_cliente'];

    $sentencia = $pdo->prepare("DELETE FROM clientes WHERE id_cliente=:id_cliente");
    $sentencia->bindParam('id_cliente', $id_cliente);
    if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Cliente eliminado con Exito";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-bodega/clientes";
        </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar Cliente";
        $_SESSION['icono'] = "error";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-bodega/clientes";
        </script>
        <?php
    }
