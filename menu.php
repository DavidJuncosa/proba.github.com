<?php
session_start();

if (!isset($_SESSION["idUsuario"])) {
    header("Location: login.php");
    exit();
}

$idUsuario = $_SESSION["idUsuario"];
$nickname = $_SESSION["nickname"];
$rol = $_SESSION["rol"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Página de Inicio</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ecf0f1;
        padding-top: 50px;
    }

    .container {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }

    .btn {
        margin-right: 10px;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .imagen {
        width: 250px;
        height: 350px;
    }

</style>
</head>
<body>
<div class="container">
    <h2>Bienvenido, <?php echo $nickname; ?>!</h2>
    <p>ID de usuario: <?php echo $idUsuario; ?></p>
    <p>Rol: <?php echo $rol; ?></p>
    <a href="cerrarSesion.php" class="btn btn-danger">Cerrar sesión</a>

    <?php
    if ($rol == "admin") {
        echo '<br><br><a href="registros.php" class="btn btn-success">Base de datos</a>';
        echo '<br><br><a href="usuarios.php" class="btn btn-success">Gestionar Usuarios</a>';
    }

    if ($rol == "editor") {
        echo '<br><br><a href="registros.php" class="btn btn-success">Base de datos</a>';
    }

    if ($rol == "") {
        echo '<br><br><img src=/MiCarpeta/img/aguscalvo.jpg class="imagen">';
    }

    ?>
    <br><br>
    <a href="img\x9muur5et8l41.png" class="btn btn-info">Prueba</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
