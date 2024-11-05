<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cartas</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <?php
    include_once "../../config/Database.php";
    include_once "../../header.php";
    include_once "../../controllers/CardController.php";
    $modelo = new Database();
    $conexion = $modelo->get_conexion();

    $nombreE = $nombre;
    $ataqueE = $ataque;
    $defensaE = $defensa;
    $tipoE = $tipo;
    $imagenE = $imagen;
    $poder_especialE = $poder_especial;
    
    ?>
    <h1>Editor de cartas</h1>
    <form action="" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="text" value="<?php echo $nombreE ?>"> <br>
        Ataque: <input type="number" name="ataque" value="<?php echo $ataqueE ?>"> <br>
        Defensa: <input type="number" name="defensa" value="<?php echo $defensaE ?>"> <br>
        Tipo: <input type="text" name="tipo" value="<?php echo $tipoE ?>"> <br>
        Imagen: <input type="file" name="imagen" accept="image/*"> <br>
        Poder especial: <input type="text" name="poder_especial" value="<?php echo $poder_especialE ?>"> <br>
        <button type="submit" name="cambios">Editar</button> 
    </form>
</body>
</html>