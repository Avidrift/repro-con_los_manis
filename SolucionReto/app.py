import json

# Datos simulados
encuestas = []
respuestas = {}

def guardar_datos():
    with open('datos.json', 'w') as f:
        json.dump({'encuestas': encuestas, 'respuestas': respuestas}, f)

def cargar_datos():
    global encuestas, respuestas
    try:
        with open('datos.json', 'r') as f:
            datos = json.load(f)
            encuestas = datos['encuestas']
            respuestas = datos['respuestas']
    except FileNotFoundError:
        guardar_datos()

def agregar_encuesta(encuesta):
    encuestas.append(encuesta)
    guardar_datos()

def agregar_respuesta(nombre, respuesta):
    if nombre not in respuestas:
        respuestas[nombre] = []
    respuestas[nombre].append(respuesta)
    guardar_datos()

cargar_datos()
