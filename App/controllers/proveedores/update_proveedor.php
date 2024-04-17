<?php
include('../../config.php');

$nombre_proveedor = $_GET['nombre_proveedor'];
$celular = $_GET['celular'];
$telefono = $_GET['telefono'];
$empresa = $_GET['empresa'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];
$id_proveedor = $_GET['id_proveedor'];

    $sentencia = $pdo->prepare("UPDATE proveedores 
    SET nombre_proveedor=:nombre_proveedor,
        celular=:celular,
        telefono=:telefono,
        empresa=:empresa,
        email=:email,
        direccion=:direccion,
        fecha_actualizacion=:fecha_actualizacion
    WHERE id_proveedor= :id_proveedor ");
    
    $sentencia->bindParam('nombre_proveedor', $nombre_proveedor);
    $sentencia->bindParam('celular', $celular);
    $sentencia->bindParam('telefono', $telefono);
    $sentencia->bindParam('empresa', $empresa);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('direccion', $direccion);
    $sentencia->bindParam('fecha_actualizacion', $fechaHora);
    $sentencia->bindParam('id_proveedor', $id_proveedor);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Proveedor actualizado con Exito";
        $_SESSION['icono'] = "success";
        //header('Location: '.$URL.'/roles/');
        ?>
        <script>
            location.href ="<?php echo $URL;?>/proveedores";
        </script>
        <?php
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar Proveedor";
        $_SESSION['icono'] = "error";
        //header('Location: '.$URL.'/roles/update.php?id='.$id_rol);
        ?>
        <script>
        location.href ="<?php echo $URL;?>/proveedores";
        </script>
        <?php
    }


