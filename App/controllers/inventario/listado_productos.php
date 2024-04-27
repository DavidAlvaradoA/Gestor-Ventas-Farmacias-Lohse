<?php


$sql_productos = "SELECT *, LAB.id_laboratorio as id_laboratorio , LAB.nombre_laboratorio as nombre_laboratorio, 
MAR.nombre_marca as nombre_marca, CAT.nombre_categoria as categoria, US.nombres as nombre_usuario
FROM inventario as INV INNER JOIN categoria as CAT on INV.id_categoria = CAT.id_categoria
INNER JOIN usuarios as US ON US.id_usuario = INV.id_usuario
INNER JOIN marca as MAR ON MAR.id_marca = INV.id_marca
INNER JOIN laboratorio as LAB ON LAB.id_laboratorio = INV.id_laboratorio";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);