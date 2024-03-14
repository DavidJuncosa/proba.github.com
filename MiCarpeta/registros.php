<?php
$servername = "localhost";
$username = "sintesi";
$password = "P@ssw0rd";
$dbname = "hadesdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM Registros";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Registros</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <h2>Tabla de Registros</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha de Nacimiento</th>
                <th>Nacionalidad</th>
                <th>Ciudad</th>
                <th>Dirección</th>
                <th>Dirección 2</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Patologías</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["idRegistro"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["apellidos"] . "</td>";
                echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                echo "<td>" . $row["nacionalidad"] . "</td>";
                echo "<td>" . $row["ciudad"] . "</td>";
                echo "<td>" . $row["direccion"] . "</td>";
                echo "<td>" . $row["direccion2"] . "</td>";
                echo "<td>" . $row["correo"] . "</td>";
                echo "<td>" . $row["telefono"] . "</td>";
                echo "<td>" . $row["estado"] . "</td>";
                echo "<td>" . $row["patologias"] . "</td>";
                echo "<td>
                        <a href='eliminar_registro.php?id=" . $row["idRegistro"] . "' class='btn btn-danger btn-sm'>Eliminar</a>
                        <a href='modificar_registro.php?id=" . $row["idRegistro"] . "' class='btn btn-primary btn-sm'>Modificar</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="añadir_registro.php" class="btn btn-primary mb-3">Añadir Registro</a>
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







