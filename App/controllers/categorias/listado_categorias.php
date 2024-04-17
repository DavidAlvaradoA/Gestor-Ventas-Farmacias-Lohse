<?php

$sql_categorias = "SELECT * FROM categoria";
$query_categorias = $pdo->prepare($sql_categorias);
$query_categorias->execute();
$datos_categorias = $query_categorias->fetchAll(PDO::FETCH_ASSOC);