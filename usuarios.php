<?php
$servername = "localhost";
$username = "sintesi";
$password = "P@ssw0rd";
$dbname = "hadesdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM Usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <h2>Tabla de Usuarios</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nickname</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["idUsuario"] . "</td>";
                echo "<td>" . $row["nickname"] . "</td>";
                echo "<td>" . $row["rol"] . "</td>";
                echo "<td>
                        <a href='eliminar_usuario.php?id=" . $row["idUsuario"] . "' class='btn btn-danger btn-sm'>Eliminar</a>
                        <a href='modificar_usuario.php?id=" . $row["idUsuario"] . "' class='btn btn-primary btn-sm'>Modificar</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="menu.php" class="btn btn-primary mb-3">Volver al Menú</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
