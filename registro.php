<?php
header('Content-Type: application/json'); // Establece el tipo de contenido a JSON

// Validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

// Conectamos a la base de datos
$connection = mysqli_connect($host, $user, $pass);

// Hacemos llamado al input del formulario
$nombre = $_POST["nombre"];
$cedula = isset($_POST["cedula"]) ? intval($_POST["cedula"]) : 0; // Asegura que sea un número entero
$area = $_POST["area"];
$hora_ingreso = $_POST["hora_ingreso"];
$foto = $_FILES["foto"];
$novedad = $_POST["novedad"];

// Validamos si la cédula es un número positivo
if ($cedula <= 0) {
    echo json_encode(['success' => false, 'message' => 'La cédula debe ser un número positivo.']);
    exit;
}

// Verificamos la conexión a la base de datos
if (!$connection) {
    echo json_encode(['success' => false, 'message' => 'No se ha podido conectar con el servidor: ' . mysqli_connect_error()]);
    exit;
}

// Indicamos el nombre de la base de datos
$datab = "dbformulario";
// Indicamos seleccionar la base de datos
$db = mysqli_select_db($connection, $datab);

if (!$db) {
    echo json_encode(['success' => false, 'message' => 'No se ha podido encontrar la Tabla']);
    exit;
}

// Insertamos datos de registro en MySQL, indicando nombre de la tabla y sus atributos, sin la foto aún
$instruccion_SQL = "INSERT INTO tabla_form (nombre, cedula, Tipo_de_registro, hora_ingreso, novedad) 
                    VALUES ('$nombre', '$cedula', '$area', '$hora_ingreso', '$novedad')";

$resultado = mysqli_query($connection, $instruccion_SQL);

if (!$resultado) {
    echo json_encode(['success' => false, 'message' => 'Ha ocurrido un error al insertar los datos: ' . mysqli_error($connection)]);
    exit;
}

// Obtenemos el ID del registro recién insertado
$registro_id = mysqli_insert_id($connection);

// Procesamos la foto subida
$foto_nombre = $registro_id . '.' . pathinfo($foto["name"], PATHINFO_EXTENSION);
$foto_ruta = "uploads/" . $foto_nombre;

if (move_uploaded_file($foto["tmp_name"], $foto_ruta)) {
    echo json_encode(['success' => true, 'message' => 'La foto se ha subido correctamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Ha ocurrido un error al subir la foto.']);
}

$update_SQL = "UPDATE tabla_form SET foto='$foto_ruta' WHERE id=$registro_id";
$resultado_update = mysqli_query($connection, $update_SQL);

if (!$resultado_update) {
    echo json_encode(['success' => false, 'message' => 'Ha ocurrido un error al actualizar la ruta de la foto: ' . mysqli_error($connection)]);
    exit;
}

mysqli_close($connection);
?>
