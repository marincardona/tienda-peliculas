<?php
$mysqli = new MySQLi("localhost", "root", "", "usuarios");
if ($mysqli->connect_errno) {
    die("Fallo la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8"); // Asegúrate de usar UTF-8 para la codificación de caracteres
?>
