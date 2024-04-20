<?php

$sql_marcas = "SELECT * FROM marca";
$query_marcas = $pdo->prepare($sql_marcas);
$query_marcas->execute();
$datos_marcas = $query_marcas->fetchAll(PDO::FETCH_ASSOC);