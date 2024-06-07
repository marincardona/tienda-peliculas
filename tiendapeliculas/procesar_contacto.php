<?php
include 'conexion.php';

// Verificar si la conexión está establecida
if (!isset($mysqli) || $mysqli->connect_error) {
    die("Error en la conexión a la base de datos");
}

// Insertar el contacto en la base de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO contactos (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
    if ($mysqli->query($sql) === TRUE) {
        // Obtener el ID del contacto insertado
        $id_contacto = $mysqli->insert_id;
        // Redirigir automáticamente a la página de ingresar película con el ID del contacto
        echo "<script>window.location.href='ingresar_pelicula.php?id_contacto=$id_contacto'</script>";
        exit();
    } else {
        echo "Error al ingresar contacto: " . $mysqli->error;
    }
}
$mysqli->close();
?>

