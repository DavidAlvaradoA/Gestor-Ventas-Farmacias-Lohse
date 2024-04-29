<?php
include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];
$id_categoria = $_GET['id_categoria'];

    $sentencia = $pdo->prepare("UPDATE categoria 
    SET nombre_categoria=:nombre_categoria,
        fecha_actualizacion=:fecha_actualizacion
    WHERE id_categoria= :id_categoria ");
    
    $sentencia->bindParam('nombre_categoria', $nombre_categoria);
    $sentencia->bindParam('fecha_actualizacion', $fechaHora);
    $sentencia->bindParam('id_categoria', $id_categoria);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Categoría actualizada con Exito";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href ="<?php echo $URL;?>/views/modulo-bodega/categorias";
        </script>
        <?php
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar Categoría";
        $_SESSION['icono'] = "error";
        ?>
        <script>
        location.href ="<?php echo $URL;?>/views/modulo-bodega/categorias";
        </script>
        <?php
    }


