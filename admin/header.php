<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
    <?php 
    include_once 'config/database.php';
    $modelo = new Database();
    $conexion = $modelo->get_conexion();

    function configuracionActual($conexion) {
        $sql = "SELECT * FROM configuracion";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $configuracion = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($configuracion as $dato) {
            echo "<br>";
            echo "$dato[clave]: $dato[valor]  ";
        }
    }

    $num_cartas = isset($_SESSION['num_cartas']) ? $_SESSION['num_cartas'] : 0;
    $nombre = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '';
    ?>
<header>
        <h1>Panel de Administración</h1>
        <nav>
            <ul>
                <li><a href="/daw/Tema8/Vsgame/admin/dashboard.php">Inicio</a></li>
                <li><a href="/daw/Tema8/Vsgame/admin/views/cards/cards.php">Cartas</a></li>
                <li><a href="/daw/Tema8/Vsgame/admin/config/config.php">Configuración</a></li>
                <li><a href="/daw/Tema8/Vsgame/admin/views/users/users.php">Usuarios</a></li>
                <li><a href="/daw/Tema8/Vsgame/admin/views/cards/cardPdf.php">Informe</a></li>
                <li><a href="/daw/Tema8/Vsgame/admin/logout.php"><?php echo $nombre;?> (Cerrar Sesión)</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-info">
            <h2>Información del juego</h2>
            <p>Número total de cartas: <?php echo $num_cartas; ?></p>
            <p>Configuración actual: <?php echo configuracionActual($conexion);?></p>
        </section>
    </main>
</body>
</html>