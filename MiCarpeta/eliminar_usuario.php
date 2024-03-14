<?php
$servername = "localhost";
$username = "sintesi";
$password = "P@ssw0rd";
$dbname = "hadesdb";

echo '<div class="container">';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idUsuario"])) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $idUsuario = $_POST["idUsuario"];

    $sql = "DELETE FROM Usuarios WHERE idUsuario = $idUsuario";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success alert-message" role="alert">Usuario eliminado correctamente.</div>';
        echo "<br><a href='usuarios.php' class='btn btn-primary'>Volver a Usuarios</a>";
        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    }

    $conn->close();
}

if (isset($_GET["id"])) {
    $idUsuario = $_GET["id"];
}
echo '</div>';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Eliminar Usuario</h2>
    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
        <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
        <a href="usuarios.php" class="btn btn-primary">Cancelar</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


