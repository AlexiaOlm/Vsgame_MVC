<?php
include_once '../models/Users.php';
include_once '../config/database.php';
include_once '../views/users/users.php';
include_once '../views/users/userEdit.php';
include_once '../views/users/userAdd.php';

$formato = new Database();
$conexion = $formato->get_conexion();
$user = new Users();

$num_usuarios = $user->obtenerNumUsuarios($conexion);

if(isset($_POST['añadir'])) {
    $nombre = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user->añadirUsuarios($conexion, $nombre, $email, $password);
    header("../../mail/registro.php");
}

if(isset($_POST['editar'])) {
    $id = $_POST['id_u'];
    $nombre = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $imagen = '';

    if(!empty($_FILES['imagen']['name'])) {
        $ruta = "../../uploads/imagenes/";
        $file = basename($_FILES['imagen']['name']);
        $archivo = $ruta . $file;

        if(move_uploaded_file($_FILES['imagen']['i_name'], $archivo)) {
            $imagen = $archivo;
        } else {
            echo "Error al subir el archivo";
        }
    }

    $user->editarUsuarios($conexion, $id, $nombre, $email, $password, $imagen);
}
?>