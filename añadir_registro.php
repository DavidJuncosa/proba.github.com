<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "sintesi";
    $password = "P@ssw0rd";
    $dbname = "hadesdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $nacionalidad = $_POST["nacionalidad"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $direccion2 = $_POST["direccion2"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $estado = $_POST["estado"];
    $patologias = $_POST["patologias"];

    $sql = "INSERT INTO Registros (nombre, apellidos, fecha_nacimiento, nacionalidad, ciudad, direccion, direccion2, correo, telefono, estado, patologias)
            VALUES ('$nombre', '$apellidos', '$fecha_nacimiento', '$nacionalidad', '$ciudad', '$direccion', '$direccion2', '$correo', '$telefono', '$estado', '$patologias')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro añadido correctamente.";
    } else {
        echo "Error al añadir el registro: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Añadir Registro</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" required>
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" required>
        </div>
        <div class="form-group">
            <label for="nacionalidad">Nacionalidad:</label>
            <input type="text" class="form-control" name="nacionalidad" required>
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" class="form-control" name="ciudad" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" name="direccion" required>
        </div>
        <div class="form-group">
            <label for="direccion2">Dirección 2:</label>
            <input type="text" class="form-control" name="direccion2">
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" class="form-control" name="correo" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" name="telefono" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" name="estado" required>
                <option value="Soltero/a">Soltero/a</option>
                <option value="En Pareja">En Pareja</option>
                <option value="Casado/a">Casado/a</option>
            </select>
        </div>
        <div class="form-group">
            <label for="patologias">Patologías:</label>
            <input type="text" class="form-control" name="patologias" required>
        </div>
        <button type="submit" class="btn btn-primary">Añadir Registro</button>
    </form>
    <a href="registros.php" class="btn btn-secondary mt-3">Volver</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



