<?php
session_start();
include 'conexion.php';

// Insertar datos del carrito en la tabla de facturación
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $id_alquiler) {
        $stmt = $mysqli->prepare("INSERT INTO facturacion (id_alquiler) VALUES (?)");
        if ($stmt) {
            $stmt->bind_param("i", $id_alquiler);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $mysqli->error;
        }
    }

    // Limpiar el carrito
    unset($_SESSION['carrito']);
    $mysqli->query("TRUNCATE TABLE carrito");
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
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
    <h1>Facturación</h1>
    <p>Facturación completa. Gracias por su alquiler.</p>
    <button type="button" onclick="window.location.href='tienda.php'">Volver a la Tienda</button>
</body>
</html>
