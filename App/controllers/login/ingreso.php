<?php

include('../../config.php');

$email = $_POST['email'];
$password_user = $_POST['password_user'];

$contador = 0;
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $email_tabla = $usuario['email'];
    $nombres = $usuario['nombres'];
    $password_user_tabla = $usuario['password_user'];
}

if ($contador > 0 && (password_verify($password_user, $password_user_tabla)) ){
    echo "Datos correctos";
    session_start();
    $_SESSION['sesion_email'] = $email;
    header('Location:'.$URL.'/index.php');
} else {
    echo "Datos Incorrectos, vuelva a intentarlo";
    session_start();
    $_SESSION['mensaje'] = "Datos Incorrectos";
    header('Location: '.$URL.'/views/login');
}
