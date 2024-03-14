<?php
$servername = "localhost";
$username = "sintesi";
$password = "P@ssw0rd";
$dbname = "hadesdb";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $idUsuario = $_POST["idUsuario"];
    $newNickname = $_POST["newNickname"];
    $newRol = $_POST["newRol"];

    $sql = "UPDATE Usuarios SET nickname='$newNickname', rol='$newRol' WHERE idUsuario=$idUsuario";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }

    $conn->close();
}

if (isset($_GET["id"])) {
    $idUsuario = $_GET["id"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Usuarios WHERE idUsuario=$idUsuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nickname = $row["nickname"];
        $rol = $row["rol"];
    } else {
        echo "No se encontró el usuario.";
        exit();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Modificar Usuario</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="newNickname">Nuevo Nickname:</label>
            <input type="text" class="form-control" id="newNickname" name="newNickname" value="<?php echo $nickname; ?>">
        </div>
        <div class="form-group">
            <label for="newRol">Nuevo Rol:</label>
            <select class="form-control" id="newRol" name="newRol">
                <option value="admin" <?php if ($rol == 'admin') echo 'selected'; ?>>admin</option>
                <option value="editor" <?php if ($rol == 'editor') echo 'selected'; ?>>editor</option>
                <option value="" <?php if ($rol == '') echo 'selected'; ?>></option>
            </select>
        </div>
        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
        <button type="submit" class="btn btn-primary">Modificar Usuario</button>
    </form>
    <a href="usuarios.php" class="btn btn-secondary mt-3">Volver</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
