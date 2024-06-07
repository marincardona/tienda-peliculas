<?php
session_start();
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

include 'conexion.php';

foreach ($_SESSION['carrito'] as $id_alquiler) {
    $stmt = $mysqli->prepare("INSERT INTO carrito (id_alquiler) VALUES (?)");
    $stmt->bind_param("i", $id_alquiler);
    $stmt->execute();
    $stmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Alquiler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            color: red;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Carrito de Alquiler</h1>
    <table>
        <tr>
            <th>ID de Alquiler</th>
            <th>Nombre del Contacto</th>
            <th>Título de la Película</th>
            <th>Fecha de Alquiler</th>
            <th>Fecha de Devolución</th>
        </tr>
        <?php
        include 'conexion.php';

        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $id_alquiler) {
                $sql = "SELECT alquileres.id, contactos.nombre, peliculas.titulo, alquileres.fecha_alquiler, alquileres.fecha_devolucion
                        FROM alquileres
                        JOIN peliculas ON alquileres.id_pelicula = peliculas.id
                        JOIN contactos ON alquileres.id_contacto = contactos.id
                        WHERE alquileres.id = $id_alquiler";
                $result = $mysqli->query($sql);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['titulo']}</td>
                            <td>{$row['fecha_alquiler']}</td>
                            <td>{$row['fecha_devolucion']}</td>
                          </tr>";
                }
            }
        } else {
            echo "<tr><td colspan='5'>No hay películas en el carrito</td></tr>";
        }

        $mysqli->close();
        ?>
    </table>
    <button type="button" onclick="window.location.href='facturar.php'">Proceder a la Facturación</button>
    <button type="button" onclick="window.location.href='lista_peliculas.php'">Volver a Lista de Películas</button>
</body>
</html>
