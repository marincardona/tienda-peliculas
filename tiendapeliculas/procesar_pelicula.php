<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_contacto = intval($_POST['id_contacto']);
    $id_pelicula = intval($_POST['id_pelicula']);
    $fecha_alquiler = $_POST['fecha_alquiler'];
    $fecha_devolucion = $_POST['fecha_devolucion'];

    $sql = "INSERT INTO alquileres (id_contacto, id_pelicula, fecha_alquiler, fecha_devolucion) 
            VALUES ('$id_contacto', '$id_pelicula', '$fecha_alquiler', '$fecha_devolucion')";

    if ($mysqli->query($sql) === TRUE) {
        header('Location: lista_peliculas.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>
>
