<?php
// Conectamos a la base de datos
$user = "root";
$pass = "";
$host = "localhost";
$datab = "dbformulario";
$connection = mysqli_connect($host, $user, $pass, $datab);

if (!$connection) {
    die("No se ha podido conectar con el servidor: " . mysqli_connect_error());
}

// Aplicamos filtro por fecha si se ha enviado
$fecha_filtro = '';
if (isset($_POST['fecha']) && !isset($_POST['reset'])) {
    $fecha_filtro = mysqli_real_escape_string($connection, $_POST['fecha']);
} elseif (isset($_POST['reset'])) {
    // Restablecer el filtro
    $fecha_filtro = '';
}

// Construimos la consulta
$query = "SELECT * FROM tabla_form";
if ($fecha_filtro) {
    $query .= " WHERE DATE(fecha_registro) = '$fecha_filtro'";
}
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Registros</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlazar archivo CSS externo -->
</head>
<body>
    <h1>Registros</h1>
    <form method="POST" action="mostrar_registros.php" class="filter-form">
        <label for="fecha">Filtrar por Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($fecha_filtro); ?>">
        <input type="submit" name="submit" value="Filtrar" class="filter-form-submit">
        <input type="submit" name="reset" value="Restablecer" class="filter-form-submit">
    </form>
    <table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cedula</th>
            <th>Tipo de Registro</th>
            <th>Hora de Ingreso</th>
            <th>Foto</th>
            <th>Novedad</th>
            <th>Fecha</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
            <td><?php echo htmlspecialchars($row['cedula']); ?></td>
            <td><?php echo htmlspecialchars($row['Tipo_de_registro']); ?></td>
            <td><?php echo htmlspecialchars($row['hora_ingreso']); ?></td>
            <td>
                <img src="mostrar_imagen.php?id=<?php echo $row['id']; ?>" alt="Imagen" width="100">
            </td>
            <td><?php echo htmlspecialchars($row['novedad']); ?></td>
            <td><?php echo htmlspecialchars($row['fecha_registro']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <div class="button-container">
        <button type="button" onclick="window.location.href='index.html'">Volver al Formulario</button>
    </div>
</body>
</html>

<?php
mysqli_close($connection);
?>
