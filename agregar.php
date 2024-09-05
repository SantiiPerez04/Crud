<?php
include('conn.php');

// Verifica si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores enviados desde el formulario
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];

    // Preparar la consulta SQL para insertar un nuevo juego
    $stmt = $connect->prepare("INSERT INTO juegos (nombre, cantidad) VALUES (:nombre, :cantidad)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':cantidad', $cantidad);
    
    // Ejecutar la consulta y redirigir al index
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al agregar el juegos.";
    }
}
?>