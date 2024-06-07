<?php
include 'conexion.php';

// Verificar si la conexión está establecida
if (!isset($mysqli) || $mysqli->connect_error) {
    die("Error en la conexión a la base de datos");
}

// Obtener valores del formulario
$titulo = isset($_POST['titulo']) ? $mysqli->real_escape_string($_POST['titulo']) : null;
$precio = isset($_POST['precio']) ? $mysqli->real_escape_string($_POST['precio']) : null;
$id_contacto = isset($_POST['id_contacto']) ? intval($_POST['id_contacto']) : null;

if ($titulo && $precio && $id_contacto) {
    $id_pelicula_query = "SELECT id FROM peliculas WHERE LOWER(titulo) = LOWER('$titulo')";
    $result = $mysqli->query($id_pelicula_query);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_pelicula = $row['id'];

            // Verificar si la película ya ha sido alquilada por el mismo contacto
            $check_query = "SELECT * FROM alquileres WHERE id_contacto = '$id_contacto' AND id_pelicula = '$id_pelicula'";
            $check_result = $mysqli->query($check_query);

            if ($check_result && $check_result->num_rows > 0) {
                echo "Ya has alquilado esta película anteriormente.";
            } else {
                $fecha_alquiler = date('Y-m-d');
                $fecha_devolucion = date('Y-m-d', strtotime('+7 days'));

                $sql = "INSERT INTO alquileres (id_contacto, id_pelicula, fecha_alquiler, fecha_devolucion) 
                        VALUES ('$id_contacto', '$id_pelicula', '$fecha_alquiler', '$fecha_devolucion')";

                if ($mysqli->query($sql) === TRUE) {
                    header('Location: lista_peliculas.php');
                    exit();
                } else {
                    echo "Error al insertar el alquiler: " . $mysqli->error;
                }
            }
        } else {
            echo "No se encontró la película con el título proporcionado.";
        }
    } else {
        echo "Error al ejecutar la consulta: " . $mysqli->error;
    }
} else {
    echo "Error: Todos los campos del formulario son obligatorios.";
}

$mysqli->close();
?>
