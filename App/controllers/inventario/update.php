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
$id_producto = $_POST['id_producto'];
$imagen_text = $_POST['image_text'];


if($_FILES['imagen_producto']['name'] != null){
    $nombre_archivo = date("Y-m-d-h-i-s");
    $imagen_text = $nombre_archivo."__".$_FILES['imagen_producto']['name'];
    $location = "../../../public/img/productos/".$imagen_text;
    move_uploaded_file($_FILES['imagen_producto']['tmp_name'],$location);

} else {
    //echo "no hay imagen";
}

    $sentencia = $pdo->prepare("UPDATE inventario 
    SET nombre_producto=:nombre_producto,
        descripcion_producto=:descripcion_producto,
        stock_producto=:stock_producto,
        stock_minimo=:stock_minimo,
        stock_maximo=:stock_maximo,
        precio_compra=:precio_compra,
        precio_venta=:precio_venta,
        fecha_ingreso=:fecha_ingreso,
        imagen_producto=:imagen_producto,
        id_categoria=:id_categoria,
        id_usuario=:id_usuario,
        fecha_actualizacion=:fecha_actualizacion
    WHERE id_producto= :id_producto");
    
    $sentencia->bindParam('nombre_producto', $nombre);
    $sentencia->bindParam('descripcion_producto', $descripcion);
    $sentencia->bindParam('stock_producto', $stock);
    $sentencia->bindParam('stock_minimo', $stock_minimo);
    $sentencia->bindParam('stock_maximo', $stock_maximo);
    $sentencia->bindParam('precio_compra', $precio_compra);
    $sentencia->bindParam('precio_venta', $precio_venta);
    $sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
    $sentencia->bindParam('imagen_producto', $imagen_text);
    $sentencia->bindParam('id_categoria', $id_categoria);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->bindParam('fecha_actualizacion', $fechaHora);
    $sentencia->bindParam('id_producto', $id_producto);
   
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Producto actualizado con Exito";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/inventario/');
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar Producto";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/inventario/update.php?id='.$id_producto);
    }




 