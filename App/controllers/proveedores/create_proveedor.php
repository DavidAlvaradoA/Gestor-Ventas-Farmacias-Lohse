<?php

include("../../config.php");;

$nombre_proveedor = $_GET['nombre_proveedor'];
$celular = $_GET['celular'];
$telefono = $_GET['telefono'];
$empresa = $_GET['empresa'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];


    $sentencia = $pdo->prepare("INSERT INTO proveedores
    ( nombre_proveedor, celular, telefono, empresa, email, direccion, fecha_creacion)
    VALUES  (:nombre_proveedor, :celular, :telefono, :empresa, :email, :direccion, :fecha_creacion)");

    $sentencia->bindParam('nombre_proveedor', $nombre_proveedor);
    $sentencia->bindParam('celular', $celular);
    $sentencia->bindParam('telefono', $telefono);
    $sentencia->bindParam('empresa', $empresa);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('direccion', $direccion);
    $sentencia->bindParam('fecha_creacion', $fechaHora);

    if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Proveedor creado con Exito";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/proveedores";
        </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al registrar Proveedor";
        $_SESSION['icono'] = "error";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/proveedores";
        </script>
        <?php
    }

