<?php
include('../../config.php');

$id_marca = $_GET['id_marca'];
$nombre_marca = $_GET['nombre_marca'];

    $sentencia = $pdo->prepare("UPDATE marca 
    SET nombre_marca=:nombre_marca
    WHERE id_marca=:id_marca");
    
    $sentencia->bindParam('nombre_marca', $nombre_marca);
    $sentencia->bindParam('id_marca', $id_marca);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Marca actualizada con Exito";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/marcas";
        </script>
        <?php
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar Marca";
        $_SESSION['icono'] = "error";
        ?>
        <script>
        location.href ="<?php echo $URL;?>/marcas";
        </script>
        <?php
    }



