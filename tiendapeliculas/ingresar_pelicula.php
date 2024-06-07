<?php
include 'conexion.php';

// Obtener el ID del contacto si está disponible
$id_contacto = isset($_GET['id_contacto']) ? intval($_GET['id_contacto']) : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ingresar Película y Alquiler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        h1 {
            color: red;
        }
        form {
            background-color: #fff;
            padding: 35px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        input[type="number"], input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"], button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #45a049;
        }
        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Ingresar Película y Alquiler</h1>

    <form action="procesar_pelicula.php" method="post">
        Contacto (ID): <input type="text" name="id_contacto" value="<?php echo htmlspecialchars($id_contacto); ?>" required><br>
        Película: <input type="text" name="id_pelicula" required><br>
        Fecha de Alquiler: <input type="date" name="fecha_alquiler" required><br>
        Fecha de Devolución: <input type="date" name="fecha_devolucion" required><br>
        <input type="submit" value="Ingresar Película y Alquiler">
        <button type="button" onclick="window.location.href='tienda.php'">Volver a la Tienda</button>
    </form>
</body>
</html>

