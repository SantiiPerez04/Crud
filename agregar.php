<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];

    $stmt = $connect->prepare("INSERT INTO juegos (nombre, cantidad) VALUES (:nombre, :cantidad)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':cantidad', $cantidad);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al agregar el juegos.";
    }
}
?>