<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Centre d'Aide - Supervision Serveur</title>
    <link rel="stylesheet" href="static/CSS/style.css"> 
    <style>
        /* Styles spécifiques pour que la page d'aide reste propre, lisible et claire */
        body { 
            padding: 40px; 
            background-color: #f4f7f6; 
            color: #333; 
            font-family: 'proxima-nova', sans-serif;
            background-image: none;
        }
        .help-container { 
            max-width: 950px; 
            margin: auto; 
            background: #ffffff; 
            padding: 40px; 
            border-radius: 12px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1); 
        }
        h1 { 
            color: #2c3e50; 
            border-bottom: 3px solid #3498db; 
            padding-bottom: 15px; 
            margin-bottom: 30px;
        }
        h2 { 
            color: #3498db; 
            margin-top: 40px; 
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .faq-item { 
            margin-bottom: 20px; 
            padding: 20px; 
            border-left: 5px solid #3498db; 
            background: #f8fbff; 
            border-radius: 0 8px 8px 0;
            transition: transform 0.2s ease;
        }
        .faq-item:hover {
            transform: translateX(5px);
        }
        .faq-item strong {
            display: block;
            font-size: 1.1rem;
            color: #2c3e50;
            margin-bottom: 8px;
        }
        .faq-item p {
            margin: 0;
            line-height: 1.6;
            color: #555;
        }
        .badge { 
            background: #3498db; 
            color: white; 
            padding: 3px 8px; 
            border-radius: 4px; 
            font-size: 0.8rem; 
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="help-container">
        <h1>📚 Centre d'Aide & Documentation</h1>
        <p>Bienvenue sur l'interface de support de votre système de supervision. Retrouvez ici le fonctionnement détaillé des différents modules de votre application.</p>

        <h2>1. Interface Globale & Navigation</h2>
        <div class="faq-item">
            <strong>Comment basculer entre le mode clair et le mode sombre ?</strong>
            <p>Dans la barre de navigation latérale (à gauche), cliquez sur le bouton rond avec l'icône de luminosité situé juste au-dessus du bouton "Logout". Toute l'interface (tableaux, widgets, graphiques) s'adaptera automatiquement.</p>
        </div>

        <h2>2. Supervision Vidéo <span class="badge">Nouveau</span></h2>
        <div class="faq-item">
            <strong>Comment gérer les différentes caméras ?</strong>
            <p>Dans l'onglet "Vidéo", vous pouvez basculer entre la <strong>Caméra 1</strong> et la <strong>Caméra 2</strong> à l'aide des onglets situés au-dessus du flux vidéo.</p>
        </div>
        <div class="faq-item">
            <strong>Comment orienter la caméra ?</strong>
            <p>Utilisez le panneau de contrôle avec les flèches directionnelles pour orienter la caméra. Le bouton central permet de la recentrer instantanément.</p>
        </div>
        <div class="faq-item">
            <strong>Comment prendre une capture d'écran ?</strong>
            <p>Sous le flux vidéo, cliquez sur le bouton <strong>"Capture"</strong>. L'image sera automatiquement téléchargée sur votre ordinateur. Le bouton "Reset" permet de réinitialiser les paramètres vidéo.</p>
        </div>

        <h2>3. Capteurs & Graphiques <span class="badge">Nouveau</span></h2>
        <div class="faq-item">
            <strong>Comment lire les données en temps réel ?</strong>
            <p>L'onglet "Capteur" présente de grands widgets affichant la Température, l'Humidité et l'état de la Porte de la salle serveur. Ces valeurs se mettent à jour automatiquement sans recharger la page.</p>
        </div>
        <div class="faq-item">
            <strong>À quoi servent les graphiques en bas de page ?</strong>
            <p>Sous les indicateurs instantanés, deux graphiques interactifs retracent l'historique de la température et de l'humidité. Vous pouvez survoler les courbes avec votre souris pour voir les valeurs exactes relevées aux différentes heures.</p>
        </div>

        <h2>4. Historique des Événements</h2>
        <div class="faq-item">
            <strong>Comment consulter les anciens relevés ?</strong>
            <p>L'onglet "Historique" regroupe tous les événements passés sous forme de tableau. Vous pouvez utiliser le bouton <strong>"Importer"</strong> pour récupérer de nouvelles données externes et les intégrer au système.</p>
        </div>

        <h2>5. Administration & Sécurité</h2>
        <div class="faq-item">
            <strong>Quelles sont les règles de création d'un compte ?</strong>
            <p>Pour des raisons de sécurité, lors de l'inscription (Sign up), un mot de passe doit contenir <strong>au moins 8 caractères, dont un chiffre et une majuscule</strong>.</p>
        </div>
        <div class="faq-item">
            <strong>Comment accéder à la gestion des utilisateurs ?</strong>
            <p>Dans l'onglet "Administration", une double sécurité est en place. Vous devez vous reconnecter avec les identifiants administrateurs. Une fois connecté, vous pourrez supprimer des comptes utilisateurs (le compte principal "admin" est protégé et ne peut pas être supprimé).</p>
        </div>

        <footer style="margin-top: 50px; font-size: 0.8em; color: #888; text-align: center; border-top: 1px solid #eee; padding-top: 20px;">
            Système de Supervision v1.2.4 - Projet de Supervision &copy; <?php echo date('Y'); ?> <br>
            <i>W. Asomnwriri - M. Essridi - D. Cisse - T. Bizonzolo</i>
        </footer>
    </div>
</body>
</html>