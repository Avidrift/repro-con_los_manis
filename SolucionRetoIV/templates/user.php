
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Encuesta de Satisfacción</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="static/pyscript.js"></script>
    <style>
        body {
            background-image: url('fonfito.png');
            /* background-size: cover; */
            /* background-repeat: no-repeat; */
            /* background-attachment: fixed; */
        }
        .container {
            text-align: justify;
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
        <h1>Encuesta de Satisfacción</h1><br> 
        <form id="encuesta-form" action="procesar_encuesta.php" method="post">
            <label for="fecha">Fecha actual: </label><br>
            <input type="date" id="fecha" name="fecha" required><br><br>       
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br><br><br>
            <label for="respuesta1">¿Cómo te enteraste de nuestro producto/servicio?</label><br>
            <select id="respuesta1" name="respuesta1" required>
                <option value="" disabled selected>Elige una opción</option>
                <option value="Recomendación">Recomendación</option>
                <option value="Publicaciones de redes sociales">Publicaciones de redes sociales</option>
                <option value="Iniciativa de tu institución">Iniciativa de tu institución</option>
                <option value="Investigación propia">Investigación propia</option>
            </select><br><br><br><br>
            <h2 style="text-align: center;">A partir de aquí califica nuestro servicio en una escala de 1 al 5</h2><br>         
            <label for="respuesta2">¿Cómo calificarías tu experiencia general con nuestro producto/servicio?</label><br>
            <select id="respuesta2" name="respuesta2" required>
                <option value="" disabled selected>Elige una opción</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>
            <label for="respuesta3">¿Qué tan satisfecho estás con la calidad del producto/servicio?</label><br>
            <select id="respuesta3" name="respuesta3" required>
                <option value="" disabled selected>Elige una opción</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>
            <label for="respuesta4">¿Cómo calificarías la calidad del servicio al cliente que recibiste?</label><br>
            <select id="respuesta4" name="respuesta4" required>
                <option value="" disabled selected>Elige una opción</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>
            <div class="botones">
                <button type="submit">Enviar</button>
                <button type="reset">Restablecer</button>
            </div>
        </form>
    </div>
</body>
</html>
