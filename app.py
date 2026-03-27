import cv2
from flask import Flask, render_template, Response

app = Flask(__name__)


RTSP_URL = "rtsp://etudiant4:btscielir@172.20.21.24:554/live/ch0"

def generate_frames():
    camera = cv2.VideoCapture(RTSP_URL)
    while True:
        success, frame = camera.read()
        if not success:
            break
        else:
            # Encodage de l'image en JPEG
            ret, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()
            # Utilisation du format multipart pour le streaming HTTP
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')


# --- NOUVELLES ROUTES ---
@app.route('/')
def index():
    """Route pour afficher la page d'accueil."""
    return render_template('index.html')

@app.route('/video_feed')
def video_feed():
    """Route qui diffuse le flux vidéo."""
    return Response(generate_frames(),
                    mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
