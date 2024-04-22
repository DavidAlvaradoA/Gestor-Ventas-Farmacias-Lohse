<?php


$sql_compras = "SELECT *, com.precio_compra as ingreso_compra, INV.codigo_producto as codigo_producto, INV.nombre_producto as nombre_producto, 
                INV.laboratorio as descripcion_producto, INV.stock_producto as stock_producto,
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
                ON PRO.id_proveedor = com.id_proveedor";

$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$datos_compras = $query_compras->fetchAll(PDO::FETCH_ASSOC);
