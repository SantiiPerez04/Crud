<?php
include('conn.php');
// Consultar todos los juegos de la base de datos
$query = $connect->query("SELECT * FROM juegos");
$juegos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Juegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Formulario para agregar juegos -->
    <div class="container mt-5">
        <h1>Juegos</h1>
        
        <form action="agregar.php" method="POST" class="mb-3">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Juego</button>
        </form>
    <!-- Tabla que muestra los juegos -->   
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($juegos as $juego): ?>
                    <tr>
                        <td><?php echo $juego['id']; ?></td>
                        <td><?php echo $juego['nombre']; ?></td>
                        <td><?php echo $juego['cantidad']; ?></td>
                        <td>
                        <!-- Formulario para editar el juego -->
                            <form action="modificar.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $juego['id']; ?>">
                                <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                            </form>
                         <!-- Formulario para eliminar el juego -->
                            <form action="eliminar.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $juego['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este juego?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
