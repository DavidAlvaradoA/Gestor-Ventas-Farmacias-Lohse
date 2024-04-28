<?php
include('../../config.php');

$codigo = $_POST['codigo_producto'];
$id_categoria = $_POST['id_categoria'];
$id_usuario = $_POST['id_usuario'];
$id_marca = $_POST['id_marca'];
$id_laboratorio = $_POST['id_laboratorio'];
$nombre = $_POST['nombre_producto'];
$principio_activo = $_POST['principio_activo'];
$cantidad = $_POST['cantidad'];
$concentracion = $_POST['concentracion'];
$forma_farmaceutica = $_POST['forma_farmaceutica'];
$unidad_medida = $_POST['unidad_medida'];
$bioequivalente = $_POST['bioequivalente'];
$petitorio = $_POST['petitorio'];
$lote = $_POST['lote'];
$stock = $_POST['stock_producto'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_vencimiento = $_POST['fecha_vencimiento'];
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
        principio_activo=:principio_activo,
        cantidad=:cantidad,
        concentracion=:concentracion,
        forma_farmaceutica=:forma_farmaceutica,
        unidad_medida=:unidad_medida,
        bioequivalente=:bioequivalente,
        petitorio=:petitorio,
        stock_producto=:stock_producto,
        stock_minimo=:stock_minimo,
        stock_maximo=:stock_maximo,
        precio_compra=:precio_compra,
        precio_venta=:precio_venta,
        fecha_ingreso=:fecha_ingreso,
        fecha_vencimiento=:fecha_vencimiento,
        lote=:lote,
        imagen_producto=:imagen_producto,
        id_categoria=:id_categoria,
        id_marca=:id_marca,
        id_laboratorio=:id_laboratorio,
        id_usuario=:id_usuario,
        fecha_actualizacion=:fecha_actualizacion
    WHERE id_producto= :id_producto");
    
    $sentencia->bindParam('nombre_producto', $nombre);
    $sentencia->bindParam('principio_activo', $principio_activo);
    $sentencia->bindParam('cantidad', $cantidad);
    $sentencia->bindParam('concentracion', $concentracion);
    $sentencia->bindParam('forma_farmaceutica', $forma_farmaceutica);
    $sentencia->bindParam('unidad_medida', $unidad_medida);
    $sentencia->bindParam('bioequivalente', $bioequivalente);
    $sentencia->bindParam('petitorio', $petitorio);
    $sentencia->bindParam('stock_producto', $stock);
    $sentencia->bindParam('stock_minimo', $stock_minimo);
    $sentencia->bindParam('stock_maximo', $stock_maximo);
    $sentencia->bindParam('precio_compra', $precio_compra);
    $sentencia->bindParam('precio_venta', $precio_venta);
    $sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
    $sentencia->bindParam('fecha_vencimiento', $fecha_vencimiento);
    $sentencia->bindParam('lote', $lote);
    $sentencia->bindParam('imagen_producto', $imagen_text);
    $sentencia->bindParam('id_categoria', $id_categoria);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->bindParam('id_marca', $id_marca);
    $sentencia->bindParam('id_laboratorio', $id_laboratorio);
    $sentencia->bindParam('fecha_actualizacion', $fechaHora);
    $sentencia->bindParam('id_producto', $id_producto);
   
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Producto actualizado con Exito";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/views/inventario');
    } else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar Producto";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/views/inventario/update.php?id='.$id_producto);
    }




 