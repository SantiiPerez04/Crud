<?php
include('conn.php');
// Verificar si la solicitud es POST y se ha enviado un ID para eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Preparar la consulta para eliminar el juego
    $stmt = $connect->prepare("DELETE FROM juegos WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    // Ejecutar la eliminación y redirigir al index
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar el producto.";
    }
} else {
    echo "Solicitud no válida.";
}
?>