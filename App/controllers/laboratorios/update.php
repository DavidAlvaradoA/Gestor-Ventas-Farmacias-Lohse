<?php
include('../../config.php');

$id_laboratorio = $_GET['id_laboratorio'];
$nombre_laboratorio = $_GET['nombre_laboratorio'];

    $sentencia = $pdo->prepare("UPDATE laboratorio 
    SET nombre_laboratorio=:nombre_laboratorio
    WHERE id_laboratorio=:id_laboratorio");
    
    $sentencia->bindParam('nombre_laboratorio', $nombre_laboratorio);
    $sentencia->bindParam('id_laboratorio', $id_laboratorio);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Laboratorio actualizado con Exito";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/laboratorios";
        </script>
        <?php
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar Laboratorio";
        $_SESSION['icono'] = "error";
        ?>
        <script>
        location.href ="<?php echo $URL;?>/views/laboratorios";
        </script>
        <?php
    }



