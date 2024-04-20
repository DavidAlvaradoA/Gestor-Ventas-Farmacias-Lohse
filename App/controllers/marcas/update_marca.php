<?php

$id_marca_get = $_GET['id'];

$sql_marcas = "SELECT * FROM marca WHERE id_marca = '$id_marca_get'";
$query_marcas = $pdo->prepare($sql_marcas);
$query_marcas->execute();
$datos_marcas = $query_marcas->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_marcas as $datos_marca){
    $nombre_marca = $datos_marca['nombre_marca'];
}