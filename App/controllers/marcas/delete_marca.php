<?php

include('../../config.php');

$id_marca = $_GET['id_marca'];

    $sentencia = $pdo->prepare("DELETE FROM marca WHERE id_marca=:id_marca");
    $sentencia->bindParam('id_marca', $id_marca);
    if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Marca eliminado con Exito";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-bodega/Marcas";
        </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar Marca";
        $_SESSION['icono'] = "error";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-bodega/Marcas";
        </script>
        <?php
    }
