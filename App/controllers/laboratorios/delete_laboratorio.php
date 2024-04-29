<?php

include('../../config.php');

$id_laboratorio = $_GET['id_laboratorio'];

    $sentencia = $pdo->prepare("DELETE FROM laboratorio WHERE id_laboratorio=:id_laboratorio");
    $sentencia->bindParam('id_laboratorio', $id_laboratorio);
    if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Laboratorio eliminado con Exito";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-bodega/laboratorios";
        </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar Laboratorio";
        $_SESSION['icono'] = "error";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-bodega/laboratorios";
        </script>
        <?php
    }
