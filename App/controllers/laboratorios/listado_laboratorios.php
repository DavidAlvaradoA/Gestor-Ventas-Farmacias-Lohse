<?php

$sql_laboratorios = "SELECT * FROM laboratorio";
$query_laboratorios = $pdo->prepare($sql_laboratorios);
$query_laboratorios->execute();
$datos_laboratorios = $query_laboratorios->fetchAll(PDO::FETCH_ASSOC);