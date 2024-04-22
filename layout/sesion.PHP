<?php

  session_start();
  if(isset($_SESSION['sesion_email'])){
    $email_sesion = $_SESSION['sesion_email'];
    $sql = "SELECT 
    US.id_usuario as id_usuario,
    US.nombres as nombres,
    US.apellidos as apellidos,
    US.email as email,
    ROL.rol as rol
    FROM usuarios as US INNER JOIN roles as ROL on US.id_rol = rol.id_rol WHERE email = '$email_sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
      $id_usuario_sesion = $usuario['id_usuario'];
      $nombres_sesion = $usuario['nombres'];
      $apellidos_sesion = $usuario['apellidos'];
      $rol_sesion = $usuario['rol'];

}
  } else {
    header('Location: '.$URL.'/login');
  }
?>