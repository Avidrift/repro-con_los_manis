<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "_express";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos de la base de datos
$sql = "SELECT * FROM encuestas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Fecha</th><th>Nombre</th><th>Respuesta 1</th><th>Respuesta 2</th><th>Respuesta 3</th><th>Respuesta 4</th></tr>";
    // Mostrar datos en una tabla
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["fecha"]. "</td><td>" . $row["nombre"]. "</td><td>" . $row["respuesta1"]. "</td><td>" . $row["respuesta2"]. "</td><td>" . $row["respuesta3"]. "</td><td>" . $row["respuesta4"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>
