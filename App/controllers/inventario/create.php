<?php

include('../../config.php');

$codigo = $_POST['codigo_producto'];
$id_categoria = $_POST['id_categoria'];
$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion_producto'];
$stock = $_POST['stock_producto'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];


$imagen = $_POST['imagen_producto'];
$nombre_archivo = date("Y-m-d-h-i-s");
$filename = $nombre_archivo."__".$_FILES['imagen_producto']['name'];
$location = "../../../public/img/productos/".$filename;

move_uploaded_file($_FILES['imagen_producto']['tmp_name'],$location);



    $sentencia = $pdo->prepare("INSERT INTO inventario
    ( codigo_producto, 
    nombre_producto, 
    descripcion_producto, 
    stock_producto, 
    stock_minimo, 
    stock_maximo, 
    precio_compra, 
    precio_venta, 
    fecha_ingreso, 
    imagen_producto, 
    id_categoria, 
    id_usuario, 
    fecha_creacion)
VALUES (:codigo_producto,
    :nombre_producto,
    :descripcion_producto,
    :stock_producto,
    :stock_minimo,
    :stock_maximo,
    :precio_compra,
    :precio_venta,
    :fecha_ingreso,
    :imagen_producto,
    :id_categoria,
    :id_usuario,
    :fecha_creacion)");

    $sentencia->bindParam('codigo_producto', $codigo);
    $sentencia->bindParam('nombre_producto', $nombre);
    $sentencia->bindParam('descripcion_producto', $descripcion);
    $sentencia->bindParam('stock_producto', $stock);
    $sentencia->bindParam('stock_minimo', $stock_minimo);
    $sentencia->bindParam('stock_maximo', $stock_maximo);
    $sentencia->bindParam('precio_compra', $precio_compra);
    $sentencia->bindParam('precio_venta', $precio_venta);
    $sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
    $sentencia->bindParam('imagen_producto', $filename);
    $sentencia->bindParam('id_categoria', $id_categoria);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->bindParam('fecha_creacion', $fechaHora);

    if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Producto Registrado con Exito";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/inventario/');

    } else {
         session_start();
        $_SESSION['mensaje'] = "Error al registrar Producto";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/inventario/create.php');
    }

