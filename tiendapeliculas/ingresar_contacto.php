<!DOCTYPE html>
<html>
<head>
    <title>Ingresar Contacto</title>
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
            padding: 36px;
            margin: 29px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        input[type="text"], input[type="email"] {
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
            margin-top: 13px;
        }
    </style>
</head>
<body>
    <h1>Ingresar Contacto</h1>
    <form action="ingresar_contacto.php" method="post">
        <?php
        // Conexión a la base de datos
        $mysqli = new mysqli("localhost", "root", "", "usuarios"); // Cambia los valores de usuario, contraseña y nombre de la base de datos según tu configuración
        if ($mysqli->connect_errno) {
            die("Fallo la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }
        ?>
        Nombre: <input type="text" name="nombre" required><br>
        Email: <input type="email" name="email" required><br>
        Teléfono: <input type="text" name="telefono"><br>
        <input type="submit" value="Ingresar Contacto">
        <button type="button" onclick="window.location.href='tienda.php'">Volver a la Tienda</button>
    </form>
    <?php
    // Insertar el contacto en la base de datos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        $sql = "INSERT INTO contactos (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
        if ($mysqli->query($sql) === TRUE) {
            // Redirigir automáticamente a la lista de películas
            echo "<script>window.location.href='lista_peliculas.php'</script>";
            exit();
        } else {
            echo "Error al ingresar contacto: " . $mysqli->error;
        }
    }
    $mysqli->close();
    ?>
</body>
</html>
