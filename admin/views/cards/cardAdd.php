<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include_once "../../controllers/CardController.php" ;
include_once "../../header.php";

?>
    <h1>Nueva carta</h1>
    <form action="/daw/Tema8/Vsgame/admin/controllers/CardController.php" method="get">
        Nombre: <input type="text" name="nombreA"><br>
        Ataque: <input type="number" name="ataqueA" min="1"><br>
        Defensa: <input type="number" name="defensaA" min="1"><br>
        Tipo: <input type="text" name="tipoA"><br>
        Imagen: <input type="text" name="imagenA"><br>
        Poder especial: <input type="text" name="poder_especialA"><br> 
        <button type="submit" name="crear">Crear carta</button>
    </form>
</body>
</html>