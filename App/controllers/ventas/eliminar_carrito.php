<?php

include ('../../config.php');

$id_carrito = $_POST['id_carrito'];



$sentencia = $pdo->prepare("DELETE FROM carrito WHERE id_carrito=:id_carrito");

$sentencia->bindParam('id_carrito', $id_carrito); 

if($sentencia->execute()) {
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-ventas/ventas/create.php";
    </script>
    <?php
} else {
    ?>
    <script>
        location.href ="<?php echo $URL;?>/views/modulo-ventas/ventas/create.php";
    </script>
    <?php
}
