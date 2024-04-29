<?php

include('../../config.php');

$nombre_laboratorio = $_GET['nombre_laboratorio'];

        $sentencia = $pdo->prepare("INSERT INTO laboratorio
        ( nombre_laboratorio, fecha_creacion)
VALUES  (:nombre_laboratorio, :fecha_creacion)");

        $sentencia->bindParam('nombre_laboratorio', $nombre_laboratorio);
        $sentencia->bindParam('fecha_creacion', $fechaHora);

        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Laboratorio creado con Exito";
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
        