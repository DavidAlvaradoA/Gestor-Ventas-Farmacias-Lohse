<?php

$id_laboratorio_get = $_GET['id'];

$sql_laboratorios = "SELECT * FROM laboratorio WHERE id_laboratorio = '$id_laboratorio_get'";
$query_laboratorios = $pdo->prepare($sql_laboratorios);
$query_laboratorios->execute();
$datos_laboratorios = $query_laboratorios->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_laboratorios as $datos_laboratorio){
    $nombre_laboratorio = $datos_laboratorio['nombre_laboratorio'];
}