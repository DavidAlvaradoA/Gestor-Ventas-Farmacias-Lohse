<?php

include('../../config.php');

$nombre_marca = $_POST['nombre_marca'];

        $sentencia = $pdo->prepare("INSERT INTO marca
        ( nombre_marca, fecha_creacion)
VALUES  (:nombre_marca, :fecha_creacion)");

        $sentencia->bindParam('nombre_marca', $nombre_marca);
        $sentencia->bindParam('fecha_creacion', $fechaHora);

        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Marca creada con Exito";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/marcas');

        } else {
            session_start();
            $_SESSION['mensaje'] = "Error al registrar la marca";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/marcas/index.php');
        }


