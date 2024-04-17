<?php

$id_producto_get = $_GET['id'];

$sql_productos = "SELECT *, CAT.nombre_categoria as categoria, US.nombres as nombre_usuario, US.id_usuario as id_usuario
FROM inventario as INV INNER JOIN categoria as CAT on INV.id_categoria = CAT.id_categoria
INNER JOIN usuarios as US ON US.id_usuario = INV.id_usuario WHERE id_producto = '$id_producto_get'";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_productos as $datos_producto) {
    $codigo = $datos_producto['codigo_producto'];
    $nombre_categoria = $datos_producto['nombre_categoria'];
    $id_usuario = $datos_producto['id_usuario'];
    $nombre = $datos_producto['nombre_producto'];
    $descripcion = $datos_producto['descripcion_producto'];
    $stock = $datos_producto['stock_producto'];
    $stock_minimo = $datos_producto['stock_minimo'];
    $stock_maximo = $datos_producto['stock_maximo'];
    $precio_compra = $datos_producto['precio_compra'];
    $precio_venta = $datos_producto['precio_venta'];
    $fecha_ingreso = $datos_producto['fecha_ingreso'];
    $imagen = $datos_producto['imagen_producto'];
  }