<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $connect->prepare("DELETE FROM juegos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar el producto.";
    }
}
?>