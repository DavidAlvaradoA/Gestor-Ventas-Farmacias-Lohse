<?php

include('../../config.php');

$nombre_marca = $_GET['nombre_marca'];

        $sentencia = $pdo->prepare("INSERT INTO marca
        ( nombre_marca, fecha_creacion)
VALUES  (:nombre_marca, :fecha_creacion)");

        $sentencia->bindParam('nombre_marca', $nombre_marca);
        $sentencia->bindParam('fecha_creacion', $fechaHora);

        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Marca creada con Exito";
            $_SESSION['icono'] = "success";
            ?>
            <script>
                location.href ="<?php echo $URL;?>/views/modulo-bodega/marcas";
            </script>
            <?php
        } else {
            session_start();
            $_SESSION['mensaje'] = "Error al registrar Marca";
            $_SESSION['icono'] = "error";
            ?>
            <script>
                location.href ="<?php echo $URL;?>/views/modulo-bodega/marcas";
            </script>
            <?php
        }
        