<?php
// public/index.php

require_once '../clases/Database.php';

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($db->insertData($_POST['ci'], $_POST['nombre'], $_POST['fecha_nac'], $_POST['direccion'])) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos";
    }
}

$data = $db->getAllData();

$db->closeConnection();
?>
