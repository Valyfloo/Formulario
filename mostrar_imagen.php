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

// Recuperamos el ID de la imagen
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Preparamos y ejecutamos la consulta para obtener la ruta de la imagen
$query = "SELECT foto FROM tabla_form WHERE id = $id";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($connection));
}

// Verificamos si se encontró la ruta de la imagen
if ($row = mysqli_fetch_assoc($result)) {
    $foto_ruta = $row['foto'];
    if (file_exists($foto_ruta)) {
        header("Content-Type: image/jpeg"); // Cambia el tipo MIME según el formato de imagen
        readfile($foto_ruta);
    } else {
        echo "Imagen no encontrada en el servidor.";
    }
} else {
    echo "Imagen no encontrada en la base de datos.";
}

// Cerramos la conexión
mysqli_close($connection);
?>
