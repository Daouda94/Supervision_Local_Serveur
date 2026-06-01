import cv2
from flask import Flask, render_template, Response, jsonify, request, redirect, url_for, session
import numpy as np
import os
import time

app = Flask(__name__)

# ==================== CONFIGURATION DE LA CAMÉRA ====================
IP_CAM = "172.20.21.9"
USER_ONVIF = "etudiant4"
PASS_ONVIF = "btscielir"
PORT_ONVIF = 8899

RTSP_URL_1 = "rtsp://etudiant4:btscielir@172.20.21.9:554/live/ch0"
RTSP_URL_2 = "rtsp://etudiant4:btscielir@172.20.21.14:554/live/ch0"


# ==================== FONCTION DE GÉNÉRATION DE FLUX VIDÉO ====================
def generate_frames(rtsp_url):
    camera = cv2.VideoCapture(rtsp_url)
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
        #     # Pause avant de retenter la connexion
        #     camera.release()
        #     cv2.waitKey(2000)
        #     camera = cv2.VideoCapture(RTSP_URL)
        # else:
        #     ret, buffer = cv2.imencode('.jpg', frame)
        #     frame_bytes = buffer.tobytes()
        #     yield (b'--frame\r\n'
        #            b'Content-Type: image/jpeg\r\n\r\n' + frame_bytes + b'\r\n')


# def generate_frames():
#     camera = cv2.VideoCapture(RTSP_URL)
#     # Chemin vers ton icône spécifique
#     path_icon = os.path.join('static', 'ICONES', 'no-wifi.png')
    
#     while True:
#         success, frame = camera.read()
#         if not success:
#             # On tente de lire ton image personnalisée
#             no-wifi.png = cv2.imread(path_icon)
            
#             if no-wifi.png is not None:
#                 # On redimensionne l'image pour qu'elle s'adapte au flux vidéo
#                 frame = cv2.resize(no-wifi.png, (640, 480))
#             else:
#                 # Sécurité si le fichier est manquant : écran noir
#                 frame = np.zeros((480, 640, 3), dtype=np.uint8)
            
#             ret, buffer = cv2.imencode('.jpg', frame)
#             frame_bytes = buffer.tobytes()
#             yield (b'--frame\r\n'
#                    b'Content-Type: image/jpeg\r\n\r\n' + frame_bytes + b'\r\n')
            
#             # Pause avant de retenter la connexion
#             camera.release()
#             cv2.waitKey(2000)
#             camera = cv2.VideoCapture(RTSP_URL)
#         else:
#             ret, buffer = cv2.imencode('.jpg', frame)
#             frame_bytes = buffer.tobytes()
#             yield (b'--frame\r\n'
#                    b'Content-Type: image/jpeg\r\n\r\n' + frame_bytes + b'\r\n')

# ==================== INITIALISATION ONVIF (Contrôle Moteur) ==================== 

# class BougerCameraRequete(BaseModel):
#     camera_id: int  # On reçoit 1 ou 2
#     mouvement: str

# @app.post("/api/bouger-camera")
# def controleurBougerCamera(data: BougerCameraRequete):
    # Dictionnaire de mapping IP (déjà présent dans ton app.py)
    IPS_CAMERAS = {
        1: "172.20.21.9",
        2: "172.20.21.14"
    }
    
    ip = IPS_CAMERAS.get(data.camera_id)
    if not ip:
        return {"status": "erreur", "detail": "Caméra inconnue"}

    PROFILE_TOKEN = "Profile_token1" 
    url = f"http://{ip}:8899/onvif/device_service"
    headers = {"Content-Type": "application/soap+xml; charset=utf-8"}

    # Mouvement
    move_xml = construire_continuous_move_xml(PROFILE_TOKEN, data.mouvement)
    requests.post(url, headers=headers, data=move_xml, timeout=5)

    # Petit délai pour le mouvement
    import time
    time.sleep(0.5) 

    # Stop
    stop_xml = construire_stop_xml(PROFILE_TOKEN)
    resp = requests.post(url, headers=headers, data=stop_xml, timeout=5)
    
    return {"status": "ok"}

# ==================== ROUTES FLUX ====================
# Route pour la Caméra 1 (Appelée par /video_feed/1)
@app.route('/video_feed')
def video_feed_1():
    return Response(generate_frames(RTSP_URL_1),
                    mimetype='multipart/x-mixed-replace; boundary=frame')

# Route pour la Caméra 2 (Appelée par /video_feed/2)
@app.route('/video_feed/2')
def video_feed_2():
    return Response(generate_frames(RTSP_URL_2),
                    mimetype='multipart/x-mixed-replace; boundary=frame')

# ==================== ROUTE CAPTURE ====================
@app.route('/api/capture')
def capture_camera():
    # 1. Récupération des paramètres de la requête
    camera_id = request.args.get('camera_id', default=1, type=int)
    chosen_folder = request.args.get('folder', default='static/captures', type=str)
    
    rtsp_url = RTSP_URL_1 if camera_id == 1 else RTSP_URL_2
    
    # 2. Capture de l'image via le flux RTSP
    camera = cv2.VideoCapture(rtsp_url)
    success, frame = camera.read()
    camera.release()
    
    if not success:
        return jsonify({"status": "error", "message": "Impossible de lire le flux de la caméra"}), 500
        
    # 3. Tentative de création du dossier personnalisé (s'il n'existe pas)
    try:
        if not os.path.exists(chosen_folder):
            os.makedirs(chosen_folder)
    except Exception as e:
        return jsonify({
            "status": "error", 
            "message": f"Le serveur n'a pas pu créer ou accéder au dossier spécifié. Erreur : {str(e)}"
        }), 400
        
    # 4. Génération du nom de fichier et écriture sur le disque
    filename = f"capture_cam{camera_id}_{int(time.time())}.jpg"
    filepath = os.path.join(chosen_folder, filename)
    
    # Enregistrement effectif de la photo
    cv2.imwrite(filepath, frame)
    
    return jsonify({
        "status": "success", 
        "message": "Image enregistrée avec succès", 
        "file": filepath
    })

# ==================== ROUTE DE CONTRÔLE PTZ ====================
# @app.route('/camera/control')
# def control_camera():
#     global ptz, token
#     direction = request.args.get('direction')
    
#     # Si la connexion a échoué précédemment, on tente une reconnexon brute
#     if not ptz or not token:
#         init_onvif()
#         if not ptz:
#             return jsonify({"status": "error", "message": "Caméra ONVIF non joignable"}), 500

#     try:
#         if direction == 'stop':
#             ptz.Stop({'ProfileToken': token})
#             return jsonify({"status": "stopped"})

#         # Préparation de la commande de mouvement continu
#         request_ptz = ptz.create_type('ContinuousMove')
#         request_ptz.ProfileToken = token
        
#         # Configuration des vitesses de déplacement (valeurs entre -1.0 et 1.0)
#         speed = 0.25 
#         x = 0.0
#         y = 0.0

#         if direction == 'up': y = speed
#         elif direction == 'down': y = -speed
#         elif direction == 'left': x = -speed
#         elif direction == 'right': x = speed
#         else:
#             return jsonify({"status": "error", "message": "Direction inconnue"}), 400

#         # Application du vecteur de vitesse
#         request_ptz.Velocity = {'PanTilt': {'x': x, 'y': y}}
#         ptz.ContinuousMove(request_ptz)
        
#         # On laisse tourner le moteur pendant 0.4s puis on l'arrête (effet de "clic par clic")
#         time.sleep(0.4)
#         ptz.Stop({'ProfileToken': token})
        
#         return jsonify({"status": "success", "direction": direction})

#     except Exception as e:
#         return jsonify({"status": "error", "message": str(e)}), 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=7667, debug=True, threaded=True)

