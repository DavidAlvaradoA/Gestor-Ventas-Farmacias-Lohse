<?php

$id_usuario_get = $_GET['id'];

$sql_usuarios = "SELECT 
US.id_usuario as id_usuario,
US.nombres as nombres,
US.apellidos as apellidos,
US.rut as rut,
US.email as email,
ROL.rol as rol
FROM usuarios as US INNER JOIN roles as ROL on US.id_rol = rol.id_rol WHERE id_usuario = '$id_usuario_get'";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach($datos_usuarios as $datos_usuario){
    $nombres = $datos_usuario['nombres'];
    $apellidos = $datos_usuario['apellidos'];
    $rut = $datos_usuario['rut'];
    $email = $datos_usuario['email'];
    $rol = $datos_usuario['rol'];
}