<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas Alquiladas</title>
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
    <h1>Películas Alquiladas</h1>
    <table>
        <tr>
            <th>ID de Alquiler</th>
            <th>Nombre del Contacto</th>
            <th>Título de la Película</th>
            <th>Fecha de Alquiler</th>
            <th>Fecha de Devolución</th>
            <th>Acción</th>
        </tr>
        <?php
        // Incluir el archivo de conexión
        include 'conexion.php';

        // Verificar la conexión
        if ($mysqli && !$mysqli->connect_error) {
            // Consulta SQL para obtener los datos
            $sql = "SELECT alquileres.id, contactos.nombre, peliculas.titulo, alquileres.fecha_alquiler, alquileres.fecha_devolucion
                    FROM alquileres
                    JOIN peliculas ON alquileres.id_pelicula = peliculas.id
                    JOIN contactos ON alquileres.id_contacto = contactos.id";

            $result = $mysqli->query($sql);

            // Verificar si hay resultados
            if ($result) {
                if ($result->num_rows > 0) {
                    // Iterar sobre los resultados y mostrarlos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['titulo']}</td>
                                <td>{$row['fecha_alquiler']}</td>
                                <td>{$row['fecha_devolucion']}</td>
                                <td>
                                    <form action='agregar_al_carrito.php' method='post'>
                                        <input type='hidden' name='id_alquiler' value='{$row['id']}'>
                                        <button type='submit'>Añadir al carrito</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay películas alquiladas</td></tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Error en la consulta SQL: " . $mysqli->error . "</td></tr>";
            }

            // Cerrar la conexión
            $mysqli->close();
        } else {
            echo "<tr><td colspan='6'>Error en la conexión a la base de datos: " . $mysqli->connect_error . "</td></tr>";
        }
        ?>
    </table>
    <button type="button" onclick="window.location.href='tienda.php'">Volver a la Tienda</button>
</body>
</html>
