<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','baseventasfarmacia');

$servidor = "mysql:dbname=".BD.";host".SERVIDOR;

try{
$pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
}catch (PDOException $e){
    echo "Error al conectar con la base de datos";
}

$URL =  "http://localhost/Gestor-Ventas";


date_default_timezone_set("America/Santiago");
$fechaHora = date('y-m-d H:i:s');

