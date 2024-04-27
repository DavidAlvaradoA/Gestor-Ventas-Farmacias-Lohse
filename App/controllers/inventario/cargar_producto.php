<?php

$id_producto_get = $_GET['id'];

$sql_productos = "SELECT *, LAB.id_laboratorio as id_laboratorio , LAB.nombre_laboratorio as nombre_laboratorio , MAR.id_marca as id_marca, MAR.nombre_marca as nombre_marca ,  
CAT.nombre_categoria as categoria, US.nombres as nombre_usuario, US.id_usuario as id_usuario
FROM inventario as INV INNER JOIN categoria as CAT on INV.id_categoria = CAT.id_categoria
INNER JOIN usuarios as US ON US.id_usuario = INV.id_usuario 
INNER JOIN marca as MAR ON MAR.id_marca = INV.id_marca 
INNER JOIN laboratorio as LAB ON LAB.id_laboratorio = INV.id_laboratorio WHERE id_producto = '$id_producto_get'";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_productos as $datos_producto) {
    $codigo = $datos_producto['codigo_producto'];
    $nombre_categoria = $datos_producto['nombre_categoria'];
    $id_usuario = $datos_producto['id_usuario'];
    $id_marca = $datos_producto['id_marca'];
    $nombre_marca = $datos_producto['nombre_marca'];
    $id_laboratorio = $datos_producto['id_laboratorio'];
    $nombre_laboratorio = $datos_producto['nombre_laboratorio'];
    $nombre = $datos_producto['nombre_producto'];
    $principio_activo = $datos_producto['principio_activo'];
    $cantidad = $datos_producto['cantidad'];
    $concentracion = $datos_producto['concentracion'];
    $forma_farmaceutica = $datos_producto['forma_farmaceutica'];
    $unidad_medida = $datos_producto['unidad_medida'];
    $bioequivalente = $datos_producto['bioequivalente'];
    $petitorio = $datos_producto['petitorio'];
    $stock = $datos_producto['stock_producto'];
    $stock_minimo = $datos_producto['stock_minimo'];
    $stock_maximo = $datos_producto['stock_maximo'];
    $precio_compra = $datos_producto['precio_compra'];
    $precio_venta = $datos_producto['precio_venta'];
    $fecha_ingreso = $datos_producto['fecha_ingreso'];
    $fecha_vencimiento = $datos_producto['fecha_vencimiento'];
    $lote = $datos_producto['lote'];
    $imagen = $datos_producto['imagen_producto'];
  }