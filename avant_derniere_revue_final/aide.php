<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Centre d'Aide - Supervision Caméra</title>
    <link rel="stylesheet" href="static/CSS/style.css"> <style>
        body { padding: 40px; background-color: #f4f7f6; color: #333; }
        .help-container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        h2 { color: #3498db; margin-top: 30px; }
        .faq-item { margin-bottom: 20px; padding: 15px; border-left: 5px solid #3498db; background: #eef7ff; }
        .shortcut { background: #eee; padding: 2px 6px; border-radius: 4px; font-family: monospace; }
    </style>
</head>
<body>
    <div class="help-container">
        <h1>📚 Centre d'Aide & Documentation</h1>
        <p>Bienvenue sur l'interface de support de votre système de supervision.</p>

        <h2>1. Utilisation de la Vidéo</h2>
        <div class="faq-item">
            <strong>Comment prendre une capture d'écran ?</strong>
            <p>Sous le flux vidéo, cliquez sur le bouton rond <strong>"Capture"</strong>. L'image sera automatiquement téléchargée sur votre ordinateur.</p>
        </div>
        <div class="faq-item">
            <strong>Le flux vidéo ne s'affiche pas ?</strong>
            <p>Vérifiez que le serveur Flask (app.py) est lancé et que la caméra est bien connectée au réseau (IP: 172.20.21.3).</p>
        </div>

        <h2>2. Administration des Utilisateurs</h2>
        <div class="faq-item">
            <strong>Qui peut supprimer un utilisateur ?</strong>
            <p>Seul le compte <strong>admin</strong> possède les droits de suppression via l'onglet "Administration". Le compte admin lui-même est protégé contre la suppression.</p>
        </div>

        <h2>3. Capteurs et Alertes</h2>
        <p>Les données des capteurs sont rafraîchies toutes les 10 secondes. Si une valeur devient rouge, une maintenance est nécessaire sur l'équipement concerné.</p>

        <footer style="margin-top: 50px; font-size: 0.8em; color: #888; text-align: center;">
            Système de Supervision v1.0 - Projet de Suppervision &copy; <?php echo date('Y'); ?>
        </footer>
    </div>
</body>
</html>