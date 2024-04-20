<?php
include('../../config.php');

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$rut = $_POST['rut'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];
$id_usuario = $_POST['id_usuario'];
$rol = $_POST['rol'];

if($password_user == ""){
    if($password_user == $password_repeat){
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("UPDATE usuarios 
        SET nombres=:nombres,
            apellidos=:apellidos,
            rut=:rut,
            email=:email,
            id_rol=:id_rol,
            fecha_hora_actualizacion=:fecha_hora_actualizacion
        WHERE id_usuario=:id_usuario");
    
        $sentencia->bindParam('nombres', $nombres);
        $sentencia->bindParam('apellidos', $apellidos);
        $sentencia->bindParam('rut', $rut);
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('id_rol', $rol);
        $sentencia->bindParam('fecha_hora_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Usuario actualizado con Exito";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/usuarios');
    
    } else{
        //echo "La contraseña debe ser identica";
        session_start();
        $_SESSION['mensaje'] = "La contraseña debe ser identica";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/usuarios/update.php?id='.$id_usuario);
    }
} else {
    if($password_user == $password_repeat){
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("UPDATE usuarios 
        SET nombres=:nombres,
            apellidos=:apellidos,
            rut=:rut,
            email=:email,
            id_rol=:id_rol,
            password_user=:password_user,
            fecha_hora_actualizacion=:fecha_hora_actualizacion
        WHERE id_usuario=:id_usuario");
    
        $sentencia->bindParam('nombres', $nombres);
        $sentencia->bindParam('apellidos', $apellidos);
        $sentencia->bindParam('rut', $rut);
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('id_rol', $rol);
        $sentencia->bindParam('password_user', $password_user);
        $sentencia->bindParam('fecha_hora_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Usuario actualizado con Exito";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/usuarios');
    
    } else{
        //echo "La contraseña debe ser identica";
        session_start();
        $_SESSION['mensaje'] = "La contraseña debe ser identica";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/usuarios/update.php?id='.$id_usuario);
    }
}


