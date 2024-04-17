<?php

include("../../config.php");;

$nombre_categoria = $_GET['nombre_categoria'];

    $sentencia = $pdo->prepare("INSERT INTO categoria
    ( nombre_categoria, fecha_creacion)
    VALUES  (:nombre_categoria, :fecha_creacion)");

    $sentencia->bindParam('nombre_categoria', $nombre_categoria);
    $sentencia->bindParam('fecha_creacion', $fechaHora);

    if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Categoría creada con Exito";
        $_SESSION['icono'] = "success";
        //  header('Location: '.$URL.'/Categorias/');
        ?>
        <script>
            location.href ="<?php echo $URL;?>/categorias";
        </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar Categoría";
        $_SESSION['icono'] = "error";
        //  header('Location: '.$URL.'/categorias');
        ?>
        <script>
            location.href ="<?php echo $URL;?>/categorias";
        </script>
        <?php
    }

