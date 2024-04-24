<!DOCTYPE html>
<html>
<head>
    <title>Listado de Alumnos</title>
</head>
<body>
    <h2>Listado de Alumnos</h2>
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $row): ?>
            <p>CI: <?php echo $row['ci']; ?> - Nombre: <?php echo $row['nombre']; ?> - Fecha de Nacimiento: <?php echo $row['fecha_nac']; ?> - Dirección: <?php echo $row['direccion']; ?></p>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay resultados</p>
    <?php endif; ?>
    <br>
    <a href="../public/index.php">Agregar Nuevo Alumno</a>
</body>
</html>
