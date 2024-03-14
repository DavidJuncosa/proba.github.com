<?php
$servername = "localhost";
$username = "sintesi";
$password = "P@ssw0rd";
$dbname = "hadesdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idRegistro"])) {
    $idRegistro = $_POST["idRegistro"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $nacionalidad = $_POST["nacionalidad"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $estado = $_POST["estado"];
    $patologias = $_POST["patologias"];
    $ciudad = $_POST["ciudad"];
    $direccion = $_POST["direccion"];
    $direccion2 = $_POST["direccion2"];

    $sql = "UPDATE Registros SET nombre='$nombre', apellidos='$apellidos', fecha_nacimiento='$fecha_nacimiento',
            nacionalidad='$nacionalidad', correo='$correo', telefono='$telefono', estado='$estado', patologias='$patologias',
            ciudad='$ciudad', direccion='$direccion', direccion2='$direccion2' WHERE idRegistro=$idRegistro";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Registro modificado correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al modificar el registro: ' . $conn->error . '</div>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $idRegistro = $_GET["id"];
    
    $sql = "SELECT * FROM Registros WHERE idRegistro = $idRegistro";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Modificar Registro</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="idRegistro" value="<?php echo $row['idRegistro']; ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" value="<?php echo $row['apellidos']; ?>" required>
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nacionalidad">Nacionalidad:</label>
            <input type="text" class="form-control" name="nacionalidad" value="<?php echo $row['nacionalidad']; ?>" required>
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad:</label>
            <input type="text" class="form-control" name="ciudad" value="<?php echo $row['ciudad']; ?>" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion']; ?>" required>
        </div>
        <div class="form-group">
            <label for="direccion2">Dirección 2:</label>
            <input type="text" class="form-control" name="direccion2" value="<?php echo $row['direccion2']; ?>">
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" class="form-control" name="correo" value="<?php echo $row['correo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" name="estado" required>
                <option value="Soltero/a" <?php if ($row['estado'] == 'Soltero/a') echo 'selected'; ?>>Soltero/a</option>
                <option value="En Pareja" <?php if ($row['estado'] == 'En Pareja') echo 'selected'; ?>>En Pareja</option>
                <option value="Casado/a" <?php if ($row['estado'] == 'Casado/a') echo 'selected'; ?>>Casado/a</option>
            </select>
        </div>
        <div class="form-group">
            <label for="patologias">Patologías:</label>
            <input type="text" class="form-control" name="patologias" value="<?php echo $row['patologias']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Modificar Registro</button>
    </form>
    <a href="registros.php" class="btn btn-secondary mt-3">Volver</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>







