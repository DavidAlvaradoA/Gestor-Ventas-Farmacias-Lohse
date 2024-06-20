<?php
include('../../config.php');

$nombre_cliente = $_GET['nombre_cliente'];
$rut_cliente = $_GET['rut_cliente'];
$celular_cliente = $_GET['celular_cliente'];
$email_cliente = $_GET['email_cliente'];
$id_cliente = $_GET['id_cliente'];

$sentencia = $pdo->prepare("UPDATE clientes 
SET nombre_cliente=:nombre_cliente,
    rut_cliente=:rut_cliente,
    celular_cliente=:celular_cliente,
    email_cliente=:email_cliente,
    fecha_actualizacion=:fecha_actualizacion
WHERE id_cliente=:id_cliente");
    
    $sentencia->bindParam('nombre_cliente', $nombre_cliente);
    $sentencia->bindParam('rut_cliente', $rut_cliente);
    $sentencia->bindParam('celular_cliente', $celular_cliente);
    $sentencia->bindParam('email_cliente', $email_cliente);
    $sentencia->bindParam('fecha_actualizacion', $fechaHora);
    $sentencia->bindParam('id_cliente', $id_cliente);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Cliente actualizado con Exito";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-bodega/clientes";
        </script>
        <?php
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar Cliente";
        $_SESSION['icono'] = "error";
        ?>
        <script>
        location.href ="<?php echo $URL;?>/views/modulo-bodega/clientes";
        </script>
        <?php
    }


