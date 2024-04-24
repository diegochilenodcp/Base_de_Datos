<!DOCTYPE html>
<html>
<head>
    <title>Listado de Alumnos</title>
</head>
<body>
    <h2>Listado de Alumnos</h2>
    <?php
    $servername = "mysql";
    $username = "lamp_user";
    $password = "lamp_password";
    $database = "lamp_db";

    $conn = new mysqli($servername, $username, $password, $database);
    //vemos si da
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Si se envió el formulario, insertar datos en la base de datos
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $ci = $conn->real_escape_string($_POST['ci']);
        $nombre = $conn->real_escape_string($_POST['nombre']);
        $fecha_nac = $conn->real_escape_string($_POST['fecha_nac']);
        $direccion = $conn->real_escape_string($_POST['direccion']);

        // Prepararamos la consulta a SQL
        $sql = $conn->prepare("INSERT INTO tbl_alumno (ci, nombre, fecha_nac, direccion) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $ci, $nombre, $fecha_nac, $direccion);

        if ($sql->execute()) 
        {
            echo "";
        } 
        else 
        {
            echo "Error al insertar datos: " . $conn->error;
        }
    }

    // Obtener y mostrar datos de la base de datos
    $sql = "SELECT * FROM tbl_alumno";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
        {
            echo "CI: " . $row["ci"]. " - Nombre: " . $row["nombre"]. " - Fecha de nacimiento: " . $row["fecha_nac"]. " - Dirección: " . $row["direccion"]. "<br>";
        }
    } else {
        echo "0 resultados";
    }

    $conn->close();
    ?>
    <br>
    <a href="formulario.php">Agregar Nuevo Alumno</a>
</body>
</html>
