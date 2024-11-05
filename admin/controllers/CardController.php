<?php
include_once "../../config/database.php";
include_once '../../models/Cards.php';
include_once '../../views/cards/cards.php';
include_once '../../views/cards/cardEdit.php';
include_once '../../views/cards/cardAdd.php';

$modelo = new Database();
$conexion = $modelo->get_conexion();
$card = new Cards();

$nombre = '';
$ataque = 0;
$defensa = 0;
$tipo = '';
$imagen = '';
$poder_especial = '';

if(isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $card->eliminarCarta($id, $conexion);
}

if(isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $carta = $card->datosCarta($id, $conexion);

    if($carta) {
        $nombre = $carta->nombre;
        $ataque = $carta->ataque;
        $defensa = $carta->defensa;
        $tipo = $carta->tipo;
        $imagen = $carta->imagen;
        $poder_especial = $carta->poder_especial;
        datos($nombre, $ataque, $defensa, $tipo, $imagen, $poder_especial);
    }

    if(isset($_POST['cambios'])) {
        $nombre = $_POST['nombre'];
        $ataque = $_POST['ataque'];
        $defensa = $_POST['defensa'];
        $tipo = $_POST['tipo'];
        $imagen = '';
        $poder_especial = $_POST['poder_especial'];

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

        $card->actualizarCarta($conexion, $id, $nombre, $ataque, $defensa, $tipo, $imagen, $poder_especial);
    }
}


$cartasContr = $card->id_nombreCartas($conexion);

if(isset($_SERVER['nombreA']) && isset($_SERVER['ataqueA']) && (isset($_SERVER['defensaA'])) && 
(isset($_SERVER['tipoA'])) && isset($_SERVER['imagenA']) && isset($_SERVER['poder_especialA'])) {
    $nombre = $_GET["nombreA"];
    $ataque = $_GET["ataqueA"];
    $defensa = $_GET["defensaA"];
    $tipo = $_GET["tipoA"];
    $imagen = $_GET["imagenA"];
    $poder_especial = $_GET["poder_especialA"];

    $card->insertarCarta($conexion, $nombre, $ataque, $defensa, $tipo, $imagen, $poder_especial);
}

function datos($name, $ataque, $defensa, $tipo, $imagen, $poder_especial) {
    $array = [$name, $ataque, $defensa, $tipo, $imagen, $poder_especial];
    return $array;
}

?>