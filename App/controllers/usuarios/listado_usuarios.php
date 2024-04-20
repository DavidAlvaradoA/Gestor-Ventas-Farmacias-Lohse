<?php


$sql_usuarios = "SELECT 
US.id_usuario as id_usuario,
US.nombres as nombres,
US.apellidos as apellidos,
US.rut as rut,
US.email as email,
ROL.rol as rol
FROM usuarios as US INNER JOIN roles as ROL on US.id_rol = rol.id_rol";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$datos_usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);