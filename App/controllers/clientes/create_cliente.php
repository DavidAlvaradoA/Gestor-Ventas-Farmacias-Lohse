<?php

include ('../../config.php');

$nombre_cliente = $_POST['nombre_cliente'];
$rut_cliente = $_POST['rut_cliente'];
$celular_cliente = $_POST['celular_cliente'];
$email_cliente = $_POST['email_cliente'];

$sentencia = $pdo->prepare("INSERT INTO clientes
    (nombre_cliente, 
    rut_cliente, 
    celular_cliente, 
    email_cliente, 
    fecha_creacion)
VALUES 
    (:nombre_cliente,
     :rut_cliente, 
     :celular_cliente, 
     :email_cliente, 
    :fecha_creacion)");

$sentencia->bindParam('nombre_cliente', $nombre_cliente);
$sentencia->bindParam('rut_cliente', $rut_cliente);
$sentencia->bindParam('celular_cliente', $celular_cliente);
$sentencia->bindParam('email_cliente', $email_cliente);
$sentencia->bindParam('fecha_creacion', $fechaHora);
 
if($sentencia->execute()) {

    session_start();
    $_SESSION['mensaje'] = "Cliente Registrado con Exito";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-bodega/clientes/index.php";
    </script>
    <?php
} else {


    session_start();
    $_SESSION['mensaje'] = "Error al registrar Cliente";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-bodega/clientes/index.php";
    </script>
    <?php
}
