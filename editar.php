<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del producto
    $stmt = $connect->prepare("SELECT * FROM juegos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];

    $stmt = $connect->prepare("UPDATE juegos SET nombre = :nombre, cantidad = :cantidad WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':cantidad', $cantidad);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al actualizar el juegos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Producto</h1>
        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>