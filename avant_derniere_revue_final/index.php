<?php

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    require_once 'connexion.php';

    if (isset($_GET['delete_user'])) {
        // On vérifie quand même que l'utilisateur est connecté (déjà fait par le session_start au début)
        $user_to_delete = $_GET['delete_user']; 
        
        try {
            // Sécurité : On empêche quand même de supprimer le compte principal 'admin'
            $stmt = $pdo->prepare("DELETE FROM Loginz WHERE name = ? AND name != 'admin'");
            $stmt->execute([$user_to_delete]);
            
            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }

// Récupération des utilisateurs pour le tableau
$stmt = $pdo->query("SELECT * FROM Loginz");
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $show_success = false;
    if (isset($_SESSION['login_success'])) {
        $show_success = true;
        unset($_SESSION['login_success']);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Supervison Serveur</title>
        <link rel="stylesheet" href="static/CSS/style.css">
        <link rel="icon" type="ICONES/png" href="static/ICONES/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <header><h1 class="section-title" id="title_home">Home</h1>
                <h1 class="section-title" id="title_video" style="display:none">Video</h1>
                <h1 class="section-title" id="title_about" style="display:none">About</h1>
                <h1 class="section-title" id="title_capteur" style="display:none">Capteur</h1>
                <h1 class="section-title" id="title_history" style="display:none">Historique</h1>
                <h1 class="section-title" id="title_administration" style="display:none">Administration</h1>
                <img src="static/ICONES/account.png" id="user_icon">
        </header>
          
        
        <?php if ($show_success): ?>
            <div class="alert-success" id="alert-success">
                <strong>Succès !</strong> Connexion réussie, bienvenue <?php echo $_SESSION['username']; ?>.
            </div>
        <?php endif; ?>

        <div>
            <div class="sidebar">
                <div class="sidebar-logo"><img src="static/ICONES/Logo_Epi94.png" alt="Logo Epi94"></div>
                <a href="#home" id="nav_home" class="active"><img src="static/ICONES/home.png"> Home</a>
                <a href="#video" id="nav_video"><img src="static/ICONES/video.png"> Video</a>
                <a href="#capteur" id="nav_capteur"><img src="static/ICONES/capteur.png"> Capteur</a>
                <a href="#history" id="nav_history"><img src="static/ICONES/history.png">Historique</a>
                <a href="#about" id="nav_about"><img src="static/ICONES/ressource.png">About</a>

                <!-- <div class="dropdown">
                    <a href="#capteur" id="nav_capteur" class="dropdownbtn"><img src="static/ICONES/capteur.png"> Capteur</a>
                    <div class="dropdown-content">
                        <a href="#historique" id="nav_capteur_historique">Historique</a>
                        <a href="#graphe" id="nav_capteur_graphe">Graphe</a>
                    </div>
                </div> -->

                <div class="switch_theme">
                    <button id="switch_theme_button">
                    <img src="static/ICONES/luminosite.png" alt="Theme">
                    </button>
                </div>

                <a href="logout.php" id="logout_link">Logout</a>
                
                <li class="help-link-container">
                    <a href="aide.php" target="_blank">
                        <i class='bx bx-help-circle'></i>
                        <span class="links_name">Aide</span>
                    </a>
                </li>

            </div>  
            
            <div class="main-content" section="home" id="windows_home">
                <div class="widgets-container">

                    <div id='widget_home_video_container' class="widget_home_video">

                        <div id="widget_live_badge" style="display: none; position: absolute; top: 10px; left: 10px; background: rgba(255, 0, 0, 0.8); color: white; padding: 2px 8px; border-radius: 4px; font-size: 0.7rem; font-weight: bold; z-index: 10; animation: blink 1s infinite;">
                            ● LIVE
                        </div>

                        <div id="widget_loader" class="loader"></div>

                        <img id="widget_error_icon" src="static/ICONES/no-wifi.png" alt="No Signal">

                        <img id="widget_home_video" src="http://172.18.201.105:7667/video_feed" onload="widgetSuccess()"  onerror="widgetError()" style="display: none; width: 100%; height: 100%; object-fit: cover;">
                    </div>
                
                    <div class="widget_lecteur_RFID" id="widget_lecteur_RFID">
                        <p class="widget-title">Dernière entrée</p>
                        <div class="agent-logo-section"><img src="static/ICONES/account.png" alt="Logo Agent">
                        </div>
                        
                        <div class="agent-info">
                            <div class="info-group">
                                <p class="label-info">Numéro d'accès</p>
                                <p class="value-info" id="widget_rfid_numero">En attente...</p>
                            </div>
                            <div class="info-group">
                                <p class="label-info">Date & Heure</p>
                                <p class="value-info" id="widget_rfid_date">En attente...</p>
                            </div>
                        </div>
                    </div>

                    <div class="widget_capteur" id="widget_capteur">
                        <p class="widget-title">Capteurs</p>

                        <div class="sensor-list-container">
                            
                            <div class="sensor-row">
                                <div class="sensor-label">
                                    <img src="static/ICONES/temp.png" alt="Temp">
                                    <span>Température</span>
                                </div>
                                <p class="widget-value" id="val_temp">--°C</p>
                            </div>

                            <div class="sensor-row">
                                <div class="sensor-label">
                                    <img src="static/ICONES/humidity.png" alt="Humi">
                                    <span>Humidité</span>
                                </div>
                                <p class="widget-value" id="val_humi">--%</p>
                            </div>

                            <div class="sensor-row">
                                <div class="sensor-label">
                                    <img src="static/ICONES/porte.png" alt="Porte">
                                    <span>Porte</span>
                                </div>
                                <p class="widget-value" id="val_porte">Fermée</p>
                            </div>

                            <div class="sensor-row">
                                <div class="sensor-label">
                                    <img src="static/ICONES/systeme.png" alt="Sys">
                                    <span>Système</span>
                                </div>
                                <p class="widget-value" id="val_sys">OK</p>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>

            <div class="main-content" section="video" id="windows_video" style="display:none">
                
                <div class="video-section">
                    <div class="camera-selection">
                        <button id="cam1" class="tab-btn active" type="button">Caméra 1</button>
                        <button id="cam2" class="tab-btn" type="button">Caméra 2</button>
                    </div>
                        
                    <div id="camera_container">
                        <div id="cam_loader" class="loader"></div>
                        <img id="cam_error_icon" src="static/ICONES/no-wifi.png">                    
                        <img id="video_feed" src="http://172.18.201.105:7667/video_feed" onload="cameraSuccess()" onerror="cameraError()" style="display: none; width: 100%; height: auto;">
                        <img id="video_feed_2" src="http://172.18.201.105:7667/video_feed/2" onload="cameraSuccess()" onerror="cameraError()" style="display: none; width: 100%; height: auto;">
                    </div>
                </div>
                
                <div class="controllers_container">
                    <div class="cam-controlers">
                        <button class="controllers up" onmousedown="bougerCamera('up')" onmouseup="bougerCamera('stop')">
                            <span class="arrow">▲</span>
                        </button>
                        
                        <div class="horizontal-btns">
                            <button class="controllers left" onmousedown="bougerCamera('left')" onmouseup="bougerCamera('stop')">
                                <span class="arrow">◀</span>
                            </button>
                            
                            <div class="controllers-center" style="cursor:pointer;" onclick="bougerCamera('center')" title="Recentrer">
                                <span class="center-dot" style="display:block; width:15px; height:15px; border-radius:50%; background-color:var(--accent-color);"></span>
                            </div>
                            
                            <button class="controllers right" onmousedown="bougerCamera('right')" onmouseup="bougerCamera('stop')">
                                <span class="arrow">▶</span>
                            </button>
                        </div>
                        
                        <button class="controllers down" onmousedown="bougerCamera('down')" onmouseup="bougerCamera('stop')">
                            <span class="arrow">▼</span>
                        </button>
                    </div>
            

                    <div class="icon-btn">
                        <div class="icon-btn-round" onclick="" title="Capturer" id="capture_btn">
                            <img src="static/ICONES/screenshot.png" alt="Screenshot">
                            <span>Capture</span>
                        </div>

                        <div class="icon-btn-round" onclick="" title="Reset" id="reset_btn">
                            <img src="static/ICONES/reset.png" alt="Reset">
                            <span>Reset</span>
                        </div>

                    </div>

                </div>        
            </div>

            <div class="main-content" section="about" id="windows_about" style="display:none">
                <div class="about-container" style="display: flex; gap: 20px; padding: 20px;">
        
                    <div style="flex: 1;">
                        <h3>À propos du système</h3>
                        <p><strong>Supervision Serveur v1.2.4</strong></p>
                        <p>Ce système permet une surveillance en temps réel des flux vidéo, des capteurs et de l'historique des événements de vos serveurs.</p>
                    </div>

                    <div style="flex: 1;">
                        <h3>Développeurs</h3>
                        <ul>
                            <li>W. Asomnwriri - Security</li>
                            <li>M. Essridi - BDD</li>
                            <li>D. Cisse - Developer Web</li>
                            <li>T. Bizonzolo - IOT</li>

                        </ul>
                    </div>

                    <div style="flex: 1;">
                        <h3>Contact Support</h3>
                        <p>En cas de problème technique :</p>
                        <a href="">support@epi94.com</a>
                        <p><small>Dernière mise à jour : 29 Mai 2026</small></p>
                    </div>
                </div>
            </div>

            <div class="main-content" section="capteur" id="windows_capteur" style="display:none">
            </div>

            <div class="main-content" section="administration" id="windows_administration" style="display:none">
                <div class="container-form" id="admin_login_container">
                    <div class="form-box active" id="administration-form">
                        <h2>Administration</h2>
                        <input type="password" id="admin_username" placeholder="Username" required> 
                        <input type="password" id="admin_password" placeholder="Password" required>
                        <p id="message_error">Identifiants incorrects</p>
                        <button type="button" class="btn-login" onclick="verifierLoginAdmin()">LOGIN</button>
                    </div>
                </div>

                <div id="admin_table_container">
                    <div>
                        <h2>Gestion des Utilisateurs</h2>
                        <button onclick="deconnexionAdmin()" id="button_deconnexion">Déconnexion</button>
                    </div>
    
                    <div id="admin_table" style="width: 90%;">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Nom d'utilisateur</th>
                                    <th>Mot de passe</th>
                                    <th >Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($utilisateurs as $user): ?>
                                    <tr>
                                        <td>
                                            <?= htmlspecialchars($user['name']) ?>
                                        </td>
                                        <td>
                                            <span class="password-masked">••••••••</span>
                                        </td>
                                        <td>
                                            <span style="color: #2ecc71; font-size: 0.8em;">● Actif</span>
                                        </td>
                                        <td>
                                            <?php if ($user['name'] !== 'admin'): ?>
                                                <button type="button" class="btn-delete" onclick="confirmSuppression('<?= addslashes($user['name']) ?>')">
                                                    Supprimer
                                                <?php else: ?>
                                                    <span style="color: gray; font-style: italic;">Protégé</span>
                                                <?php endif; ?>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="main-content" section="history" id="windows_history" style="display:none">
                <div class="table-header-actions">
                    <button type="button" class="btn-import" onclick="importerDonnees()" id="button_import">
                        <img src="static/ICONES/import.png" alt="Import">
                    </button>
                </div>

                <div id="table-historique"></div>
            
        </div>

    <script src="static/JS/mesFonction.js"></script>
    <script src="static/JS/javastuff.js"></script>
    </body>
    
</html>