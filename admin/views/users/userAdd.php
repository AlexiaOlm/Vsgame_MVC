<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <?php
    include_once '../../controllers/UserController.php';
    include_once '../../header.php';
    ?>

    <main>
        <section class="dashboard-info">
           <div class="form-container">
            <h2>Añadir Usuario</h2>
            <form action="../../controllers/UserController.php" method="POST">
                <label for="nickname">Nickname:</label>
                <input type="text" name="nickname" id="nickname" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" name="añadir">Añadir Usuario</button>
            </form>
        </div>
        </section>
    </main>
</body>
</html>
