/* =================== changer section afficher =================== */
document.getElementById("nav_home").addEventListener("click", changerSection);
document.getElementById("nav_video").addEventListener("click", changerSection);
document.getElementById("nav_about").addEventListener("click", changerSection);
document.getElementById("nav_capteur").addEventListener("click", changerSection);
document.getElementById("nav_video").addEventListener("click", changerSection);
document.getElementById("nav_history").addEventListener("click", changerSection);

function changerSection()
{  console.debug(this);

  if(this.id == "nav_home")
  { 
    const widgetImg = document.getElementById("widget_home_video");
    const src = widgetImg.src;
    widgetImg.src = ""; 
    widgetImg.src = src;
    
    document.getElementById("windows_home").style.display = "block";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_about").style.display = "none";
    document.getElementById("windows_capteur").style.display = "none";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "none";
    

    document.getElementById("title_home").style.display = "block";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_about").style.display = "none";
    document.getElementById("title_capteur").style.display = "none";
    document.getElementById("title_administration").style.display = "none";
    document.getElementById("title_history").style.display = "none";
  }
  else if(this.id == "nav_video")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "block";
    document.getElementById("windows_about").style.display = "none";
    document.getElementById("windows_capteur").style.display = "none";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "none";


    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "block";
    document.getElementById("title_about").style.display = "none";
    document.getElementById("title_capteur").style.display = "none";
    document.getElementById("title_administration").style.display = "none";
    document.getElementById("title_history").style.display = "none";

    const videoImg = document.getElementById("video_stream");
    if(videoImg) {
        const currentSrc = videoImg.src;
        videoImg.src = ""; // Reset
        videoImg.src = currentSrc; // Relance
    }
  }
  else if(this.id == "nav_about")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_about").style.display = "block";
    document.getElementById("windows_capteur").style.display = "none";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "none";

    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_about").style.display = "block";
    document.getElementById("title_capteur").style.display = "none";
    document.getElementById("title_administration").style.display = "none";
    document.getElementById("title_history").style.display = "none";
  }
  else if(this.id == "nav_capteur")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_about").style.display = "none";
    document.getElementById("windows_capteur").style.display = "block";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "none";

    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_about").style.display = "none";
    document.getElementById("title_capteur").style.display = "block";
    document.getElementById("title_administration").style.display = "none";
    document.getElementById("title_history").style.display = "none";
  }
    else if(this.id == "nav_history")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_about").style.display = "none";
    document.getElementById("windows_capteur").style.display = "none";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "block";

    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_about").style.display = "none";
    document.getElementById("title_capteur").style.display = "none";
    document.getElementById("title_administration").style.display = "none";
    document.getElementById("title_history").style.display = "block";

  }
}


/* =================== widget home video clickable et affichant l'onglet video =================== */
document.getElementById("widget_home_video_container").addEventListener("click", afficherWindowsVideo);

function afficherWindowsVideo()
{
  document.getElementById("windows_home").style.display = "none";
  document.getElementById("windows_video").style.display = "block";
  document.getElementById("windows_about").style.display = "none";
  document.getElementById("windows_capteur").style.display = "none";
  document.getElementById("windows_history").style.display = "none";


  document.getElementById("title_home").style.display = "none";
  document.getElementById("title_video").style.display = "block";
  document.getElementById("title_about").style.display = "none";
  document.getElementById("title_capteur").style.display = "none";
  document.getElementById("title_history").style.display = "none";

  document.getElementById("nav_home").classList.remove("active");
  document.getElementById("nav_video").classList.add("active");
}


/* =================== widget lecteur RFID clickable et affichant l'onglet history =================== */
document.getElementById("widget_lecteur_RFID").addEventListener("click", afficherWindowsHistory);

function afficherWindowsHistory() 
{
  document.getElementById("windows_home").style.display = "none";
  document.getElementById("windows_video").style.display = "none";
  document.getElementById("windows_about").style.display = "none";
  document.getElementById("windows_capteur").style.display = "none";
  document.getElementById("windows_history").style.display = "block";


  document.getElementById("title_home").style.display = "none";
  document.getElementById("title_video").style.display = "none";
  document.getElementById("title_about").style.display = "none";
  document.getElementById("title_capteur").style.display = "none";
  document.getElementById("title_history").style.display = "block";

  document.getElementById("nav_home").classList.remove("active");
  document.getElementById("nav_history").classList.add("active");
}

/* =================== widget capteur clickable et affichant l'onglet capteur =================== */
document.getElementById("widget_capteur").addEventListener("click", afficherWindowsCapteur);

function afficherWindowsCapteur()
{
  document.getElementById("windows_home").style.display = "none";
  document.getElementById("windows_video").style.display = "none";
  document.getElementById("windows_about").style.display = "none";
  document.getElementById("windows_capteur").style.display = "block";
  document.getElementById("windows_history").style.display = "none";


  document.getElementById("title_home").style.display = "none";
  document.getElementById("title_video").style.display = "none";
  document.getElementById("title_about").style.display = "none";
  document.getElementById("title_capteur").style.display = "block";
  document.getElementById("title_history").style.display = "none";

  document.getElementById("nav_home").classList.remove("active");
  document.getElementById("nav_capteur").classList.add("active");
}

/* =================== changement de l'onglet actif sur la sidebar =================== */
document.getElementById("nav_home").addEventListener("click", changerOngletActive);
document.getElementById("nav_video").addEventListener("click", changerOngletActive);
document.getElementById("nav_about").addEventListener("click", changerOngletActive);
document.getElementById("nav_capteur").addEventListener("click", changerOngletActive);
document.getElementById("nav_history").addEventListener("click", changerOngletActive);

function changerOngletActive()
{
  if(this.id == "nav_home")
  {
    document.getElementById("nav_home").classList.add("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_about").classList.remove("active");
    document.getElementById("nav_capteur").classList.remove("active");
    document.getElementById("nav_history").classList.remove("active");
  }
  else if(this.id == "nav_video")
  {
    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.add("active");
    document.getElementById("nav_about").classList.remove("active");
    document.getElementById("nav_capteur").classList.remove("active");
    document.getElementById("nav_history").classList.remove("active");
  }
  else if(this.id == "nav_about")
  {
    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_about").classList.add("active");
    document.getElementById("nav_capteur").classList.remove("active");
    document.getElementById("nav_history").classList.remove("active");
  }
  else if(this.id == "nav_capteur")
  {
    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_about").classList.remove("active");
    document.getElementById("nav_capteur").classList.add("active");
    document.getElementById("nav_history").classList.remove("active");
  }
  else if(this.id == "nav_history")
  {
    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_about").classList.remove("active");
    document.getElementById("nav_capteur").classList.remove("active");
    document.getElementById("nav_history").classList.add("active");
  }
}


/* =================== switch theme clair/sombre =================== */
document.getElementById("switch_theme_button").addEventListener("click", switchTheme);

function switchTheme()
{
  const htmlElement = document.documentElement;
  if (htmlElement.getAttribute("data-theme") === "light") {
      htmlElement.setAttribute("data-theme", "dark");
    }else{
        htmlElement.setAttribute("data-theme", "light");
    }
}


/* =================== Afficher/Masquer password login =================== */
function Shown_password() {
  var x = document.getElementById("password_login");
  var y = document.getElementById("password_register");
  var z = document.getElementById("confirm_password_register");

  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }

  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }

}

/* =================== Login/Register =================== */
function showRegisterForm() {
    // Affiche le contenu Register, masque le contenu Login
    document.getElementById('register-form').style.display = 'block';
    document.getElementById('login-form').style.display = 'none';
    
    // Met à jour les boutons (Grisé / Surbrillance)
    document.getElementById('toggle-signup').classList.add('active');
    document.getElementById('toggle-signin').classList.remove('active');
}

function showLoginForm() {
    // Affiche le contenu Login, masque le contenu Register
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
    
    // Met à jour les boutons (Grisé / Surbrillance)
    document.getElementById('toggle-signin').classList.add('active');
    document.getElementById('toggle-signup').classList.remove('active');
}



/* =================== Page administration =================== */
document.getElementById("user_icon").addEventListener("click", afficher_page_administration);

function afficher_page_administration() {
  if(this.id == "user_icon")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_about").style.display = "none";
    document.getElementById("windows_history").style.display = "none";
    document.getElementById("windows_administration").style.display = "block";

    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_about").style.display = "none";
    document.getElementById("title_capteur").style.display = "none";
    document.getElementById("title_history").style.display = "none";
    document.getElementById("title_administration").style.display = "block";

    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_about").classList.remove("active");
    document.getElementById("nav_capteur").classList.remove("active");
    document.getElementById("nav_hstory").classList.remove("active");
  
    document.getElementById("administration-form").style.display = "block";
  
  }
}

function verifierLoginAdmin() {
    // 1. Récupération des valeurs saisies
    const userVal = document.getElementById("admin_username").value;
    const passVal = document.getElementById("admin_password").value;
    
    // 2. Récupération de l'élément d'erreur (assure-toi que cet ID existe dans ton HTML)
    const errorMsg = document.getElementById("admin_error"); 

    // 3. Définition des identifiants (en local pour l'instant)
    const adminUser = "admin";
    const adminCode = "admin";

    // 4. Vérification
    if (userVal === adminUser && passVal === adminCode) {
        // Succès : on bascule l'affichage
        document.getElementById("admin_login_container").style.display = "none";
        document.getElementById("admin_table_container").style.display = "block";
        document.getElementById("admin_table").style.display = "block";

        if (errorMsg) errorMsg.style.display = "none";
        console.log("Accès Admin accordé");
    } else {
        // Échec : on affiche l'erreur
        if (errorMsg) {
            errorMsg.style.display = "block";
            errorMsg.innerText = "Identifiants incorrects";
        } else {
            alert("Identifiants incorrects"); // Repli si l'élément HTML n'existe pas
        }
    }
}

function deconnexionAdmin() {
    // Reset les champs et l'affichage
    document.getElementById("admin_username").value = "";
    document.getElementById("admin_password").value = "";
    document.getElementById("admin_login_container").style.display = "flex";
    document.getElementById("admin_table_container").style.display = "none";
    document.getElementById("admin_table").style.display = "none";
}

function confirmSuppression(userName) {
    // 1. On demande confirmation à l'administrateur
    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer l'utilisateur '" + userName + "' de la base de données ?");
    
    // 2. Si l'administrateur clique sur "OK"
    if (confirmation) {
        // On redirige la page vers index.php avec le paramètre attendu par ton bloc PHP
        window.location.href = "index.php?delete_user=" + encodeURIComponent(userName);
    }
}

/* =================== alert success =================== */
document.addEventListener("DOMContentLoaded", function() {
    // On récupère la valeur PHP
    const formToOpen = "<?php echo $form_to_show; ?>";
    
    // Si c'est register, on bascule l'affichage
    if (formToOpen === 'register') {
        // On utilise ta fonction existante dans mesFonction.js
        // Si ta fonction toggleForm() ne prend pas de paramètre, 
        // assure-toi qu'elle fait bien l'alternance.
        const login = document.getElementById('login-form');
        const register = document.getElementById('register-form');
        login.style.display = "none";
        register.style.display = "block";
    }
});

function toggleForm() {
    const login = document.getElementById('login-form');
    const register = document.getElementById('register-form');
    
    if (login.style.display === "none") {
        login.style.display = "block";
        register.style.display = "none";
    } else {
        login.style.display = "none";
        register.style.display = "block";
    }
}

window.addEventListener('load', function() {
  const successAlert = document.getElementById("alert-success");
    
  if (successAlert) {
      // 5000 millisecondes = 5 secondes
      setTimeout(() => {
          successAlert.style.opacity = "0"; // Fait un fondu (disparition visuelle)
          
          // Attends 500ms (le temps du fondu) avant de supprimer l'élément du code
          setTimeout(() => successAlert.remove(), 500); 
      }, 5000); 
  }
});


/* =================== tentative connexion cam =================== */
function cameraSuccess() {
    // Si la vidéo charge : on cache le loader et l'erreur, on montre la vidéo
    document.getElementById("cam_loader").style.display = "none";
    document.getElementById("cam_error_icon").style.display = "none";
    document.getElementById("video_feed").style.display = "block";
}

function cameraError() {
    // Si échec : on cache le loader et la vidéo, on montre l'icône WiFi
    document.getElementById("cam_loader").style.display = "none";
    document.getElementById("video_feed").style.display = "none";
    document.getElementById("video_feed_2").style.display = "none";
    document.getElementById("cam_error_icon").style.display = "block";
}

/* =================== widget cam =================== */
function widgetSuccess() {
    document.getElementById("widget_loader").style.display = "none";
    document.getElementById("widget_error_icon").style.display = "none";
    document.getElementById("widget_home_video").style.display = "block";
    document.getElementById("widget_live_badge").style.display = "block"; // Affiche le badge LIVE
}

function widgetError() {
    document.getElementById("widget_loader").style.display = "none";
    document.getElementById("widget_home_video").style.display = "none";
    document.getElementById("widget_live_badge").style.display = "none";
    document.getElementById("widget_error_icon").style.display = "block";
}


/* =================== selection camera =================== */
  document.getElementById("cam1").addEventListener("click",changeCamera);
  document.getElementById("cam2").addEventListener("click",changeCamera);

function changeCamera(){
  console.debug("Bouton cliqué :", this.id);

  if(this.id == "cam1"){
  document.getElementById("video_feed").style.display = "block";
  document.getElementById("video_feed_2").style.display = "none";
  document.getElementById("cam1").classList.add("active")
  document.getElementById("cam2").classList.remove("active")
  }

  else if(this.id == "cam2"){
    document.getElementById("video_feed").style.display = "none";
    document.getElementById("video_feed_2").style.display = "block";
    document.getElementById("cam1").classList.remove("active")
  document.getElementById("cam2").classList.add("active")  
  }
}
  
/* =================== control =================== */
// // Variable globale pour suivre la caméra sélectionnée
// let currentCameraId = 1;

// // Mise à jour lors du clic sur l'onglet
// function changeCamera() {
//     // ... ton code de bascule visuelle ...
//     currentCameraId = (this.id === "cam1") ? 1 : 2;
// }

// // Fonction appelée par tes boutons de contrôle (flèches)
// function envoyerCommande(direction) {
//     fetch('/api/bouger-camera', {
//         method: 'POST',
//         headers: {'Content-Type': 'application/json'},
//         body: JSON.stringify({
//             camera_id: currentCameraId,
//             mouvement: direction
//         })
//     })
//     .then(res => res.json())
//     .then(data => console.log("Réponse:", data));
// }

/* =================== Capture d'écran avec choix du dossier =================== */
document.getElementById("capture_btn").addEventListener("click", effectuerCaptureServeur);

function efectuarCaptureServeur() {
  // 1. Déterminer quelle caméra est active
  let currentCameraId = 1;
  if (document.getElementById("cam2").classList.contains("active")) {
    currentCameraId = 2;
  }

  // 2. Récupérer le chemin du dossier écrit par l'utilisateur
  let dossierSaisi = document.getElementById("capture_folder_input").value.trim();
  
  // Si le champ est vide, on définit un dossier par défaut
  if (!dossierSaisi) {
    dossierSaisi = "static/captures"; 
  }

  // 3. URL de votre serveur Flask
  const flaskUrl = "http://172.18.201.105:7667";

  // 4. Envoi de la requête avec les paramètres (ID caméra + Dossier encodé pour les espaces ou slashs)
  fetch(`${flaskUrl}/api/capture?camera_id=${currentCameraId}&folder=${encodeURIComponent(dossierSaisi)}`)
    .then(response => {
      if (!response.ok) throw new Error("Erreur serveur");
      return response.json();
    })
    .then(data => {
      if (data.status === "success") {
        alert("Succès ! Image enregistrée dans :\n" + data.file);
        console.log("Fichier créé :", data.file);
      } else {
        alert("Erreur Flask : " + data.message);
      }
    })
    .catch(error => {
      console.error("Erreur de communication :", error);
      alert("Erreur : Impossible de joindre le serveur Flask.");
    });
}

function importerDonnees() {
    const table = document.querySelector('#table-historique table');
    if (!table) return;

    // Génération du nom de fichier basé sur l'heure locale
    const now = new Date();
    const dateStr = now.getFullYear() + '-' + 
                    String(now.getMonth() + 1).padStart(2, '0') + '-' + 
                    String(now.getDate()).padStart(2, '0') + '_' +
                    String(now.getHours()).padStart(2, '0') + '-' + 
                    String(now.getMinutes()).padStart(2, '0') + '-' + 
                    String(now.getSeconds()).padStart(2, '0');
    
    const filename = `historique_${dateStr}.csv`;

    // ... (ton code pour extraire les données du tableau) ...
    let csv = [];
    const rows = table.querySelectorAll('tr');
    // ... (tes boucles de récupération de données) ...

    const csvString = "\uFEFF" + csv.join('\n');

    // Envoi au PHP, en incluant le nom de fichier dans le POST
    fetch('save_csv.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'csv_data=' + encodeURIComponent(csvString) + '&filename=' + encodeURIComponent(filename)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') alert("Sauvegarde réussie : " + data.path);
        else alert("Erreur : " + data.message);
    });
}