<?php

include('../../config.php');

$rol = $_POST['rol'];

        $sentencia = $pdo->prepare("INSERT INTO roles
        ( rol, fecha_creacion)
VALUES  (:rol, :fecha_creacion)");

        $sentencia->bindParam('rol', $rol);
        $sentencia->bindParam('fecha_creacion', $fechaHora);

        if($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Rol creado con Exito";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/roles/');

        } else {
            session_start();
            $_SESSION['mensaje'] = "Error al registrar Rol";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/roles/create.php');
        }





