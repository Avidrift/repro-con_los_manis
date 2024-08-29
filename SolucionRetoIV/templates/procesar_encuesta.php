<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <title>Datos guardados correctamente</title>
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
            padding: 90px;
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
            margin: 0 20px; /* Espacio entre los botones */
        }
    </style>
</head>
<body>
    

    <header>
        <div class="logo">
            <a href="/SolucionRetoII/index.html"><button type="button"><img src="logo.png" alt="Logo del Hub de Innovación"></button></a>
            <h2 class="nombre-empresa"></h2>
        </div>  
        <nav>
            <a href="https://www.google.com" class="nav-link"><button>Salir Del Programa</button></a>
            <a href="/index.html" class="nav-link"><button>Menu Principal</button></a>
        </nav>        
    </header><br>

    
    <div class="container">
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

        // Obtener datos del formulario
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nombre'];
        $respuesta1 = $_POST['respuesta1'];
        $respuesta2 = $_POST['respuesta2'];
        $respuesta3 = $_POST['respuesta3'];
        $respuesta4 = $_POST['respuesta4'];

        // Insertar datos en la base de datos
        $sql = "INSERT INTO encuestas (fecha, nombre, respuesta1, respuesta2, respuesta3, respuesta4) VALUES ('$fecha', '$nombre', '$respuesta1', '$respuesta2', '$respuesta3', '$respuesta4')";

        if ($conn->query($sql) === TRUE) {
            echo "<h1> Datos guardados de forma completa </h1> <br>";
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>
        <br><br>

    <div class="botones">
        <a href="/SolucionRetoII/index.html"><button>Terminar</button></a>
    </div>

    </div>
</body>
</html>




