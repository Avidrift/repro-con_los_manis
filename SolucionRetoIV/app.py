


def getInput():
            #user_name = Element("nombre").element.value
            #user_answer = Element("respuesta").element.value
            nombre= input()
            respuesta = input()
            user_name = nombre
            user_answer = respuesta
            with open("templates/datos_encuesta.txt", 'w') as archivo:
                archivo.write(user_name + "\n")
                archivo.write(user_answer + "\n")

getInput()