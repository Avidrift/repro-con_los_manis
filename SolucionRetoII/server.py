import http.server
import socketserver
import json

PORT = 8000

# Datos simulados
encuestas = []
respuestas = []

class MyHandler(http.server.SimpleHTTPRequestHandler):
    def do_GET(self):
        if self.path == '/admin':
            self.path = 'admin_login.html'
        elif self.path == '/usuario':
            self.path = 'usuario_encuesta.html'
        elif self.path.startswith('/admin/resultados'):
            encuesta_id = int(self.path.split('/')[-1])
            self.path = 'resultados.html'
            self.send_response(200)
            self.send_header('Content-type', 'text/html')
            self.end_headers()
            with open(self.path, 'r') as file:
                html = file.read()
                encuesta = encuestas[encuesta_id]
                respuestas_encuesta = [r for r in respuestas if r['encuesta_id'] == encuesta_id]
                html = html.replace('{{ encuesta.titulo }}', encuesta['titulo'])
                respuestas_html = ''
                for respuesta in respuestas_encuesta:
                    respuestas_html += f"<li>{respuesta['nombre']}: <ul>"
                    for key, value in respuesta['respuestas'].items():
                        respuestas_html += f"<li>{key}: {value}</li>"
                    respuestas_html += "</ul></li>"
                html = html.replace('{% for respuesta in respuestas %}', respuestas_html)
                self.wfile.write(html.encode())
            return
        else:
            self.path = 'index.html'
        return http.server.SimpleHTTPRequestHandler.do_GET(self)

    def do_POST(self):
        content_length = int(self.headers['Content-Length'])
        post_data = self.rfile.read(content_length)
        data = json.loads(post_data)

        if self.path == '/admin':
            if data['password'] == 'admin':
                self.send_response(200)
                self.send_header('Content-type', 'application/json')
                self.end_headers()
                self.wfile.write(json.dumps({'status': 'success', 'encuestas': encuestas}).encode())
            else:
                self.send_response(401)
                self.end_headers()
        elif self.path == '/admin/nueva_encuesta':
            titulo = data['titulo']
            preguntas = data['preguntas']
            encuestas.append({'titulo': titulo, 'preguntas': preguntas})
            self.send_response(200)
            self.end_headers()
        elif self.path == '/usuario':
            nombre = data['nombre']
            encuesta_id = data['encuesta_id']
            respuestas_usuario = data['respuestas']
            respuestas.append({'nombre': nombre, 'encuesta_id': encuesta_id, 'respuestas': respuestas_usuario})
            self.send_response(200)
            self.end_headers()

with socketserver.TCPServer(("", PORT), MyHandler) as httpd:
    print("serving at port", PORT)
    httpd.serve_forever()
