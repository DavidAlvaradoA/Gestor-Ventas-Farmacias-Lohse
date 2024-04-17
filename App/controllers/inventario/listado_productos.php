<?php


$sql_productos = "SELECT *, CAT.nombre_categoria as categoria, US.nombres as nombre_usuario
FROM inventario as INV INNER JOIN categoria as CAT on INV.id_categoria = CAT.id_categoria
INNER JOIN usuarios as US ON US.id_usuario = INV.id_usuario";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);