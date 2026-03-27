import cv2
from flask import Flask, render_template, Response, jsonify, request, redirect, url_for, session
# from onvif import ONVIFCamera
# from onvif import OnvifClient
from onvif import ONVIFCamera
import numpy as np
import os

app = Flask(__name__)

# ==================== CONFIGURATION DE LA CAMÉRA ====================
IP_CAM = "172.20.21.15"
USER_ONVIF = "etudiant4"
PASS_ONVIF = "btscielir"
PORT_ONVIF = 8899

RTSP_URL = "rtsp://etudiant4:btscielir@172.20.21.15:554/live/ch0"
# ====================  FONCTION DE GÉNÉRATION DE FLUX VIDÉO ==================== 
# ------------------------------------------------ FONCTION DE GÉNÉRATION DE FLUX VIDÉO ----------------------------
# def generate_frames():
#     camera = cv2.VideoCapture(RTSP_URL)
#     while True:
#         success, frame = camera.read()
#         if not success:
#             break
#         else:
#             # Encodage de l'image en JPEG
#             ret, buffer = cv2.imencode('.jpg', frame)
#             frame = buffer.tobytes()
#             # Utilisation du format multipart pour le streaming HTTP
#             yield (b'--frame\r\n'
#                    b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

def generate_frames():
    camera = cv2.VideoCapture(RTSP_URL)
    # Chemin vers ton icône spécifique
    path_icon = os.path.join('static', 'ICONES', 'no_signal_video.png')
    
    while True:
        success, frame = camera.read()
        if not success:
            # On tente de lire ton image personnalisée
            no_signal_img = cv2.imread(path_icon)
            
            if no_signal_img is not None:
                # On redimensionne l'image pour qu'elle s'adapte au flux vidéo
                frame = cv2.resize(no_signal_img, (640, 480))
            else:
                # Sécurité si le fichier est manquant : écran noir
                frame = np.zeros((480, 640, 3), dtype=np.uint8)
            
            ret, buffer = cv2.imencode('.jpg', frame)
            frame_bytes = buffer.tobytes()
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame_bytes + b'\r\n')
            
            # Pause avant de retenter la connexion
            camera.release()
            cv2.waitKey(2000)
            camera = cv2.VideoCapture(RTSP_URL)
        else:
            ret, buffer = cv2.imencode('.jpg', frame)
            frame_bytes = buffer.tobytes()
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame_bytes + b'\r\n')

# ==================== INITIALISATION ONVIF (Contrôle Moteur) ==================== 
token = None

# # def init_onvif():
#     global ptz, token
#     try:
#         print(f"Connexion ONVIF à {IP_CAM}:{PORT_ONVIF}...")
#         mycam = ONVIFCamera(IP_CAM, PORT_ONVIF, USER_ONVIF, PASS_ONVIF)
        
#         # Création des services
#         media = mycam.create_media_service()
#         ptz = mycam.create_ptz_service()
        
#         # Récupération du profil caméra
#         profile = media.GetProfiles()[0]
#         token = profile.token
#         print("✅ Connexion ONVIF réussie !")
#     except Exception as e:
#         print(f"❌ Erreur connexion ONVIF : {e}")
#         ptz = None

# init_onvif()

# ==================== ROUTES ====================
@app.route('/video_feed')
def video_feed():
    """Route qui diffuse le flux vidéo."""
    return Response(generate_frames(),
                    mimetype='multipart/x-mixed-replace; boundary=frame')

# @app.route('/control_camera')
# def control_camera():
#     direction = request.args.get('direction')
    
#     # Si la connexion a échoué au démarrage, on réessaie
#     if not ptz:
#         init_onvif()
#         if not ptz:
#             return jsonify({"status": "error", "message": "Caméra non connectée"}), 500

#     try:
#         # Préparation de la commande
#         request_ptz = ptz.create_type('ContinuousMove')
#         request_ptz.ProfileToken = token
        
#         # Vitesse du mouvement (0.0 à 1.0)
#         speed = 0.15
#         x = 0.0
#         y = 0.0

#         if direction == 'up': y = speed
#         elif direction == 'down': y = -speed
#         elif direction == 'left': x = -speed
#         elif direction == 'right': x = speed
#         elif direction == 'stop':
#             ptz.Stop({'ProfileToken': token})
#             return jsonify({"status": "stopped"})

#         request_ptz.Velocity = {'PanTilt': {'x': x, 'y': y}}
#         ptz.ContinuousMove(request_ptz)
        
#         # Astuce : On bouge pendant 0.3s puis on arrête pour faire un "pas"
#         time.sleep(0.3)
#         ptz.Stop({'ProfileToken': token})
        
#         return jsonify({"status": "success", "direction": direction})

#     except Exception as e:
#         print(f"Erreur commande : {e}")
#         return jsonify({"status": "error", "message": str(e)}), 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=7666, debug=True ,threaded=True)

