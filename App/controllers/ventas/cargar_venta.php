<?php

$sql_ventas = "SELECT *, 
                CLI.nombre_cliente as nombre_cliente 
                FROM ventas as VE 
                INNER JOIN clientes as CLI
                ON CLI.id_cliente = VE.id_cliente
                WHERE VE.id_venta = '$id_venta_get' ";

$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$datos_ventas = $query_ventas->fetchAll(PDO::FETCH_ASSOC);


foreach ($datos_ventas as $dato_ventas)
{
    $nro_venta = $dato_ventas['nro_venta'];
    $id_cliente = $dato_ventas['id_cliente'];
}