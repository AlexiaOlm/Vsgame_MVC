<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Configuración</title>
</head>
<body>
    <?php
    include_once '../header.php';
    ?>
    <form action="/daw/Tema8/Vsgame/admin/controllers/ConfigController.php" method="get">
        Clave: <input type="text" name="clave" required> <br>
        Valor: <input type="number" name="valor" required> <br>
        <button type="submit" name="editar">Editar</button>
    </form>
</body>
</html>