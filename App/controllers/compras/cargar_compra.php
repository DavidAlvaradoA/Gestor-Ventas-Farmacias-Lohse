<?php

$id_compra_get = $_GET['id'];


$sql_compras = "SELECT *, com.precio_compra as ingreso_compra, INV.codigo_producto as codigo_producto, INV.nombre_producto as nombre_producto, 
                INV.descripcion_producto as descripcion_producto, INV.stock_producto as stock_producto,
                INV.stock_minimo as stock_minimo, INV.stock_maximo as stock_maximo, INV.precio_compra as precio_producto,
                INV.precio_venta as precio_venta_p, INV.fecha_ingreso as fecha_ingreso, INV.imagen_producto as imagen,
                CAT.nombre_categoria as nombre_categoria, US.nombres as nombre_usuario, PRO.nombre_proveedor as nombre_proveedor,
                PRO.celular as celular_proveedor, PRO.telefono as telefono_proveedor, PRO.empresa as empresa_proveedor,
                PRO.email as email_proveedor, PRO.direccion as direccion_proveedor
                FROM compras as com 
                INNER JOIN inventario as INV 
                ON com.id_producto = INV.id_producto 
                INNER JOIN categoria as CAT 
                ON CAT.id_categoria = INV.id_categoria
                INNER JOIN usuarios US
                ON US.id_usuario = com.id_usuario
                INNER JOIN proveedores PRO 
                ON PRO.id_proveedor = com.id_proveedor
                WHERE com.id_compra = '$id_compra_get' ";

$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$datos_compras = $query_compras->fetchAll(PDO::FETCH_ASSOC);

    //Producto
foreach($datos_compras as $datos_compra){
    $id_compra = $datos_compra['id_compra'];
    $id_producto_tabla = $datos_compra['id_producto'];
    $id_proveedor_tabla = $datos_compra['id_proveedor'];
    $nro_compra = $datos_compra['nro_compra'];
    $codigo_producto = $datos_compra['codigo_producto'];
    $categoria = $datos_compra['nombre_categoria'];
    $usuario = $datos_compra['nombre_usuario'];
    $nombre_producto = $datos_compra['nombre_producto'];
    $descripcion = $datos_compra['descripcion_producto'];
    $stock = $datos_compra['stock_producto'];
    $stock_minimo = $datos_compra['stock_minimo'];
    $stock_maximo = $datos_compra['stock_maximo'];
    $precio_compra = $datos_compra['precio_producto'];
    $precio_venta = $datos_compra['precio_venta_p'];
    $fecha_compra = $datos_compra['fecha_ingreso'];
    $imagen = $datos_compra['imagen'];

    //Proveedor
    $nombre_proveedor = $datos_compra['nombre_proveedor'];
    $celular = $datos_compra['celular_proveedor'];
    $telefono = $datos_compra['telefono_proveedor'];
    $email = $datos_compra['email_proveedor'];
    $empresa = $datos_compra['empresa_proveedor'];
    $direccion = $datos_compra['direccion_proveedor'];

    //Compra
    $comprobante = $datos_compra['comprobante'];
    $precio_comprac = $datos_compra['ingreso_compra'];
    $fecha_comprac = $datos_compra['fecha_compra'];
    $ingreso_stock = $datos_compra['cantidad'];
    

}