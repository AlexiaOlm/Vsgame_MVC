<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <?php
    include_once '../../header.php';
    include_once '../../controllers/UserController.php';
    session_start();

    echo "<button href='userAdd.php'>Añadir usuario</button>";
    ?>
</body>
</html>