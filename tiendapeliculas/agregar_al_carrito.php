<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_alquiler = intval($_POST['id_alquiler']);

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    if (!in_array($id_alquiler, $_SESSION['carrito'])) {
        $_SESSION['carrito'][] = $id_alquiler;
    }
}

header('Location: carrito.php');
exit();
?>
