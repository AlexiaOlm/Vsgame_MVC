<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cartas</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
<?php
    session_start();
    include_once "../../header.php";
    include_once "../../config/database.php";
    include_once "../../controllers/CardController.php";

    $modelo = new Database();
    $conexion = $modelo->get_conexion();
    $cartas = $cartasContr;


    if (basename($_SERVER['PHP_SELF']) === 'cards.php'):
?>

<table>
    <thead>
        <tr>
            <th>Carta</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cartas as $carta): ?>
            <tr>
                <td><?php echo $carta['nombre']; ?></td>
                <td>
                    <form action="" method="get">
                        <button href="cardEdit.php?id=<?php echo $carta['id']; ?>" name="editar">Editar</button>
                        <button type="submit" name="eliminar" value="<?php echo $carta['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta carta?');">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
</body>
</html>