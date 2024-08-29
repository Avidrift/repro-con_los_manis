<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <script defer src="static/pyscript.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url('fonfito.png');
            /* background-size: cover; */
            /* background-repeat: no-repeat; */
            /* background-attachment: fixed; */
        }
        .container {
            text-align: center;
            border: 1px solid rgb(141, 140, 140);
            padding: 50px;
            width: 900px; /* Ancho del formulario */
            height: auto; /* Altura del formulario */
            margin: 0 auto;
            background-color: rgb(233, 230, 230);
        }

        .botones {
            text-align: center;
            margin-top: 20px;
        }

        .botones button {
            margin: 0 10px; /* Espacio entre los botones */
        }

        .center-table {
        margin-left: auto;
        margin-right: auto;
        border-color: rgb(433, 430, 430) ;
        }
    </style>
    
</head>
<body>
    <header>
        <div class="logo">
            <a href="/SolucionRetoII/index.html" ><button type="button" ><img src="logo.png" alt="Logo del Hub de Invovacion"></button></a>
            <h2 class="nombre-empresa"></h2>
        </div>
        <nav>
            <a href="https://www.google.com" class="nav-link"><button>Salir Del Programa</button></a>
            <a href="/SolucionRetoII/index.html" class="nav-link"><button>Menu Principal</button></a>

        </nav>
    </header>
    <br>
    <div class="container">
        <h1>Encuestas de Satisfacción</h1>
    
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
            echo "<table class='center-table' border='1'><tr><th>Fecha</th><th>Nombre</th><th>Respuesta 1</th><th>Respuesta 2</th><th>Respuesta 3</th><th>Respuesta 4</th></tr>";
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
    </div>

</body>
</html>
