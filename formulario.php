<!DOCTYPE html>
<html>
<head>
    <title>Formulario y Datos de la Base de Datos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Formulario de Datos</h2>
    <form method="post" action="http://localhost/FORMESTUDIANTE/indexform.php">
            <div class="form-group">
                <label for="ci">CI:</label>
                <input type="text" class="form-control" id="ci" name="ci" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="fecha_nac">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <?php
    $servername = "mysql";
    $username = "lamp_user"; 
    $password = "lamp_password";
    $database = "lamp_db";

    // Creaamo conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // validar si funciona
    if ($conn->connect_error) 
    {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // despues de enviar insertamos los datos
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $ci = $conn->real_escape_string($_POST['ci']);
        $nombre = $conn->real_escape_string($_POST['nombre']);
        $fecha_nac = $conn->real_escape_string($_POST['fecha_nac']);
        $direccion = $conn->real_escape_string($_POST['direccion']);

        // Preparamos la consulta al SQL
        $sql = $conn->prepare("INSERT INTO tbl_alumno (ci, nombre, fecha_nac, direccion) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $ci, $nombre, $fecha_nac, $direccion);

        if ($sql->execute()) {
            echo "Datos insertados correctamente <br>";
        } else {
            echo "Error al insertar datos: <br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
