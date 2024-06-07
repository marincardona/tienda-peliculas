<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas Alquiladas</title>
    <link rel="shortcut icon" href="img/usuario.png">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #1D819E;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }
        .header {
            background-color: #f2f2f2;
            padding: 20px;
            margin-bottom: 20px;
        }
        h1 {
            color: black;
            font-size: 60px;
        }
        .container-fluid {
            max-width: 1200px;
            margin: 0 auto;
        }
        .list-group-item.active {
            background-color: #698A9D;
            border-color: #8AABBE;
        }
        .thumbnail {
            border: 1px auto #ddd;
            border-radius: 6px;
            padding: 4px;
            margin: 8px;
            text-align: center;
        }
        .caption {
            padding: 10px;
        }
        footer {
            background-color: #1D819E;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>ALQUILER DE PELÍCULAS CARDONA</h1>
        <p style="font-size: 18px;">LA MEJOR OPCIÓN PARA ALQUILAR LAS MEJORES PELÍCULAS.</p>
    </div>
    <div class="container-fluid">
        <div class="row">
            <aside id="center" class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        <h1 style="font-size: 24px;">Bienvenido al Sistema de Control de Alquiler de Películas</h1>
                        <ul>
                            <li><a href="ingresar_contacto.php" class="list-group-item active"><center>Ingresar Contacto para Alquiler</center></a></li>
                            <li><a href="ingresar_pelicula.php" class="list-group-item active"><center>Ingresar Películas y Alquiler</center></a></li>
                            <li><a href="lista_peliculas.php" class="list-group-item active"><center>Lista Películas Alquiladas</center></a></li>
                            <li><a href="index.php" class="list-group-item active"><center>Cerrar sesión</center></a></li>
                        </ul>
                    </a>
                </div>
            </aside>
            <section id="seccion" class="col-md-9">
                <div class="row">
                    <?php
                    include 'conexion.php';
                    $contactos_result = $mysqli->query("SELECT id, nombre FROM contactos");
                    $contactos = [];
                    while ($contacto = $contactos_result->fetch_assoc()) {
                        $contactos[] = $contacto;
                    }

                    $peliculas = [
                        ['titulo' => 'The Amazing Spiderman', 'imagen' => 'img/spiderman.jpg', 'precio' => 65],
                        ['titulo' => 'Transformers', 'imagen' => 'img/TRANSFORMERS_ RISE OF THE BEASTS.jpg', 'precio' => 75],
                        ['titulo' => 'Oppen Heimer', 'imagen' => 'img/oppenheimer.jpg', 'precio' => 100],
                        ['titulo' => 'Dr. Gregory House', 'imagen' => 'img/house.jpg', 'precio' => 120],
                        ['titulo' => 'El Lobo De Wall Street', 'imagen' => 'img/el lobo.jpg', 'precio' => 80],
                        ['titulo' => 'John Wick', 'imagen' => 'img/John Wick 4.jpg', 'precio' => 90],
                        ['titulo' => 'Súper Mario Bros', 'imagen' => 'img/super.jpg', 'precio' => 85],
                        ['titulo' => 'Misión De Rescate', 'imagen' => 'img/misión de rescate.jpg', 'precio' => 100],
                    ];

                    foreach ($peliculas as $pelicula) {
                        echo '<div class="col-xs-6 col-sm-4 col-md-3">
                                <div class="thumbnail">
                                    <img src="' . $pelicula['imagen'] . '" alt="' . $pelicula['titulo'] . '" style="height: 350px; width: 120%;">
                                    <div class="caption">
                                        <h3>' . $pelicula['titulo'] . '</h3>
                                        <p>Precio: Q' . $pelicula['precio'] . '</p>
                                        <p><a href="https://www.filmaffinity.com/es/" class="btn btn-primary" role="button">Sinopsis</a></p>
                                        <form action="procesar_alquiler.php" method="post">
                                            <input type="hidden" name="titulo" value="' . $pelicula['titulo'] . '">
                                            <input type="hidden" name="precio" value="' . $pelicula['precio'] . '">
                                            <label for="id_contacto">Seleccione Contacto:</label>
                                            <select name="id_contacto" id="id_contacto">';
                        foreach ($contactos as $contacto) {
                            echo '<option value="' . $contacto['id'] . '">' . $contacto['nombre'] . '</option>';
                        }
                        echo '              </select>
                                            <button type="submit" class="btn btn-danger">Alquilar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                    }
                    ?>
                </div>
                <footer id="pie" class="col-md-12">
                    <center>© ALQUILER DE PELICULAS CARDONA!</center>
                </footer>
                <br><br>
            </section>
        </div>
    </div>
</body>
</html>
