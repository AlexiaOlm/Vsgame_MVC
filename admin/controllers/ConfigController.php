<?php
include_once '../models/ConfigM.php';
include_once '../config/database.php';

session_start();

$config = new ConfigM();
$modelo = new Database();
$conexion = $modelo->get_conexion();

if(isset($_GET['clave']) && ($_GET['valor'])) {
    $clave = $_GET['clave'];
    $valor = $_GET['valor'];

    $config->actualizarConfiguracion($conexion, $clave, $valor);
}

$config->mostrarConfiguracion($conexion);

?>