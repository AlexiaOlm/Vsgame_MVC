<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuarios</title>
</head>
<body>
    <?php
    include_once '../../controllers/UserController.php';
    include_once '../../header.php';

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="id_u">Id:</label>
        <input type="text" name="id_u" id="id_u" value="<?php echo $id; ?>">

        <label for="nickname">Nickname:</label>
        <input type="text" name="nickname" id="nickname" value="<?php echo $nombre; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="img">

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" name="editar">Editar Usuario</button>
    </form>
</body>
</html>