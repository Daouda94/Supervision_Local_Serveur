<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Supervison Serveur</title>
        <link rel="stylesheet" href="static/CSS/style.css">
    </head>

    <body>
        <header><h1 class="section-title" id="title_home">Home</h1>
                <h1 class="section-title" id="title_video" style="display:none">Video</h1>
                <h1 class="section-title" id="title_resources" style="display:none">Ressources</h1>
                <h1 class="section-title" id="title_capteur" style="display:none">Capteur</h1>
                <h1 class="section-title" id="title_administration" style="display:none">Administration</h1>
                <img src="static/ICONES/account.png" id="user_icon">
        </header>

        <div>
            <div class="sidebar">
                <div class="sidebar-logo"><img src="static/ICONES/logo2.png" alt="Logo Supervision"></div>
                <a href="#home" id="nav_home" class="active"><img src="static/ICONES/home.png"> Home</a>
                <a href="#video" id="nav_video"><img src="static/ICONES/video.png"> Video</a>
                <a href="#resources" id="nav_resources"><img src="static/ICONES/ressource.png">Ressources</a>

                <div class="dropdown">
                    <a href="#capteur" id="nav_capteur" class="dropdownbtn"><img src="static/ICONES/capteur.png"> Capteur</a>
                    <div class="dropdown-content">
                        <a href="#historique" id="nav_capteur_historique">Historique</a>
                        <a href="#graphe" id="nav_capteur_graphe">Graphe</a>
                    </div>
                </div>

                <div class="switch_theme">
                    <button id="switch_theme_button">
                    <img src="static/ICONES/luminosite.png" alt="Theme">
                    </button>
                </div>

                <a href="logout.php" id="logout_link">Logout</a>
            </div>
            
            <div class="main-content" section="home" id="windows_home">
                <div class="widgets-container">
                    <div class="widget_home_video">
                        <img id="widget_home_video" src="http://172.18.201.105:7666/video_feed">
                    </div>
                
                    <div class="widget_lecteur_RFID" id="widget_lecteur_RFID">
                        <p class="widget-title">Dernière entrée</p>
                        <div class="agent-logo-section"><img src="static/ICONES/account.png" alt="Logo Agent">
                        </div>
                        
                        <div class="agent-info">
                            <div class="info-group">
                                <p class="label-info">Nom Agent</p>
                                <p class="value-info">Agent_007</p>
                            </div>
                            <div class="info-group">
                                <p class="label-info">Numéro</p>
                                <p class="value-info">0123456789</p>
                            </div>
                        </div>
                    </div>

                    <div class="widget_capteur" id="widget_capteur">
                        <p class="widget-title">Capteur</p>
                    </div>

                </div>
            </div>

            <div class="main-content" section="video" id="windows_video" style="display:none">
                <img id="video_feed" src="http://172.18.201.105:7666/video_feed">

                <div class="controllers_container">
                    <div class="cam-controlers">
                        <button class="controllers up" onclick="controlCamera('up')">
                            <span class="arrow">▲</span>
                        </button>
                        
                        <div class="horizontal-btns">
                            <button class="controllers left" onclick="controlCamera('left')">
                                <span class="arrow">◀</span>
                            </button>
                            
                            <div class="controllers-center">
                                <span class="center-dot"></span>
                            </div>
                            
                            <button class="controllers right" onclick="controlCamera('right')">
                                <span class="arrow">▶</span>
                            </button>
                        </div>
                        
                        <button class="controllers down" onclick="controlCamera('down')">
                            <span class="arrow">▼</span>
                        </button>
                    </div>
                </div>

            </div>

            <div class="main-content" section="ressources" id="windows_resources" style="display:none">
            </div>

            <div class="main-content" section="capteur" id="windows_capteur" style="display:none">
            </div>

            <div class="main-content" section="administration" id="windows_administration" style="display:none">
    
                <div class="container-form" id="admin_login_container">
                    <div class="form-box active" id="administration-form">
                        <h2>Administration</h2>
                        <input type="password" id="admin_username" placeholder="Username" required> <input type="password" id="admin_password" placeholder="Password" required>
                        <p id="message_error">Identifiants incorrects</p>
                        <button type="button" class="btn-login" onclick="verifierLoginAdmin()">LOGIN</button>
                    </div>
                </div>

                <div id="admin_table_container" style="display:none">
                    <div>
                        <h2>Gestion des Utilisateurs</h2>
                        <button onclick="deconnexionAdmin()" id=button_deconnexion >Déconnexion</button>
                    </div>
                    
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="user_table_body">
                            <tr>
                                <td>1</td>
                                <td>Agent_007</td>
                                <td>********</td>
                                <td>Utilisateur</td>
                                <td>
                                    <button class="btn-edit">Edit</button>
                                    <button class="btn-delete">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>

    <script src="static/JS/mesFonction.js"></script>
    </body>
    
</html>