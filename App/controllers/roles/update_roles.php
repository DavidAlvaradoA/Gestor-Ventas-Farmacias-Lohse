<?php

$id_rol_get = $_GET['id'];

$sql_roles = "SELECT * FROM roles WHERE id_rol = '$id_rol_get'";
$query_roles = $pdo->prepare($sql_roles);
$query_roles->execute();
$datos_roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_roles as $datos_rol){
    $rol = $datos_rol['rol'];
}