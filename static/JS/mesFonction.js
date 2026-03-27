/* =================== changer section afficher =================== */

document.getElementById("nav_home").addEventListener("click", changerSection);
document.getElementById("nav_video").addEventListener("click", changerSection);
document.getElementById("nav_resources").addEventListener("click", changerSection);
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
    document.getElementById("windows_resources").style.display = "none";
    document.getElementById("windows_capteur").style.display = "none";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "none";
    

    document.getElementById("title_home").style.display = "block";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_resources").style.display = "none";
    document.getElementById("title_capteur").style.display = "none";
    document.getElementById("title_administration").style.display = "none";
    document.getElementById("title_history").style.display = "none";
  }
  else if(this.id == "nav_video")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "block";
    document.getElementById("windows_resources").style.display = "none";
    document.getElementById("windows_capteur").style.display = "none";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "none";


    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "block";
    document.getElementById("title_resources").style.display = "none";
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
  else if(this.id == "nav_resources")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_resources").style.display = "block";
    document.getElementById("windows_capteur").style.display = "none";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "none";

    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_resources").style.display = "block";
    document.getElementById("title_capteur").style.display = "none";
    document.getElementById("title_administration").style.display = "none";
    document.getElementById("title_history").style.display = "none";
  }
  else if(this.id == "nav_capteur")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_resources").style.display = "none";
    document.getElementById("windows_capteur").style.display = "block";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "none";

    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_resources").style.display = "none";
    document.getElementById("title_capteur").style.display = "block";
    document.getElementById("title_administration").style.display = "none";
    document.getElementById("title_history").style.display = "none";
  }
    else if(this.id == "nav_history")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_resources").style.display = "none";
    document.getElementById("windows_capteur").style.display = "none";
    document.getElementById("windows_administration").style.display = "none";
    document.getElementById("windows_history").style.display = "block";

    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_resources").style.display = "none";
    document.getElementById("title_capteur").style.display = "none";
    document.getElementById("title_administration").style.display = "none";
    document.getElementById("title_history").style.display = "block";

  }
}


/* =================== widget home video clickable et affichant l'onglet video =================== */

document.getElementById("widget_home_video").addEventListener("click", afficherWindowsVideo);

function afficherWindowsVideo()
{
  document.getElementById("windows_home").style.display = "none";
  document.getElementById("windows_video").style.display = "block";
  document.getElementById("windows_resources").style.display = "none";
  document.getElementById("windows_capteur").style.display = "none";
  document.getElementById("windows_history").style.display = "none";


  document.getElementById("title_home").style.display = "none";
  document.getElementById("title_video").style.display = "block";
  document.getElementById("title_resources").style.display = "none";
  document.getElementById("title_capteur").style.display = "none";
  document.getElementById("title_history").style.display = "none";

  document.getElementById("nav_home").classList.remove("active");
  document.getElementById("nav_video").classList.add("active");
}
/* =================== widget home video clickable et affichant l'onglet video =================== */

document.getElementById("widget_lecteur_RFID").addEventListener("click", afficherWindowsHistory);

function afficherWindowsHistory()
{
  document.getElementById("windows_home").style.display = "none";
  document.getElementById("windows_video").style.display = "none";
  document.getElementById("windows_resources").style.display = "none";
  document.getElementById("windows_capteur").style.display = "none";
  document.getElementById("windows_history").style.display = "block";


  document.getElementById("title_home").style.display = "none";
  document.getElementById("title_video").style.display = "none";
  document.getElementById("title_resources").style.display = "none";
  document.getElementById("title_capteur").style.display = "none";
  document.getElementById("title_history").style.display = "block";

  document.getElementById("nav_home").classList.remove("active");
  document.getElementById("nav_history").classList.add("active");
}


/* =================== changement de l'onglet actif sur la sidebar =================== */

document.getElementById("nav_home").addEventListener("click", changerOngletActive);
document.getElementById("nav_video").addEventListener("click", changerOngletActive);
document.getElementById("nav_resources").addEventListener("click", changerOngletActive);
document.getElementById("nav_capteur").addEventListener("click", changerOngletActive);
document.getElementById("nav_history").addEventListener("click", changerOngletActive);

function changerOngletActive()
{
  if(this.id == "nav_home")
  {
    document.getElementById("nav_home").classList.add("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_resources").classList.remove("active");
    document.getElementById("nav_capteur").classList.remove("active");
    document.getElementById("nav_history").classList.remove("active");
  }
  else if(this.id == "nav_video")
  {
    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.add("active");
    document.getElementById("nav_resources").classList.remove("active");
    document.getElementById("nav_capteur").classList.remove("active");
    document.getElementById("nav_history").classList.remove("active");
  }
  else if(this.id == "nav_resources")
  {
    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_resources").classList.add("active");
    document.getElementById("nav_capteur").classList.remove("active");
    document.getElementById("nav_history").classList.remove("active");
  }
  else if(this.id == "nav_capteur")
  {
    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_resources").classList.remove("active");
    document.getElementById("nav_capteur").classList.add("active");
    document.getElementById("nav_history").classList.remove("active");
  }
  else if(this.id == "nav_history")
  {
    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_resources").classList.remove("active");
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


/* =================== control camera =================== */
// function controlCamera(direction) {
//     console.log("Commande envoyée : " + direction);
    
//     fetch(`/control_camera?direction=${direction}`)
//         .then(response => response.json())
//         .then(data => {
//             if (data.status === "success") {
//                 console.log("Mouvement réussi : " + data.direction);
//             } else {
//                 console.error("Erreur caméra : " + data.message);
//             }
//         })
//         .catch(error => {
//             console.error("Erreur lors de la requête : ", error);
//         });
// }

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

/* =================== register =================== */
function showRegisterForm() {
  document.getElementById("register-form").style.display = "block";
  document.getElementById("login-form").style.display = "none";
}

function showLoginForm() {
  document.getElementById("register-form").style.display = "none";
  document.getElementById("login-form").style.display = "block";

}

/* =================== changement icone live =================== */
document.addEventListener("DOMContentLoaded", function() {
    const videoWidget = document.querySelector(".widget_home_video");
    const videoImg = document.getElementById("widget_home_video");

    // Si serveur Flask éteint
    videoImg.onerror = function() {
        videoWidget.classList.remove("is-live");
        videoWidget.classList.add("no-signal");
        videoContainer.classList.add("offline");
    };

    // Si serveur Flask allumé
    videoImg.onload = function() {
        videoWidget.classList.add("is-live");
        videoWidget.classList.remove("no-signal");
        videoContainer.classList.remove("offline");
    };
})

/* =================== Page administration =================== */
document.getElementById("user_icon").addEventListener("click", afficher_page_administration);

function afficher_page_administration() {
  if(this.id == "user_icon")
  {
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_home").style.display = "none";
    document.getElementById("windows_video").style.display = "none";
    document.getElementById("windows_resources").style.display = "none";
    document.getElementById("windows_history").style.display = "none";
    document.getElementById("windows_administration").style.display = "block";

    document.getElementById("title_home").style.display = "none";
    document.getElementById("title_video").style.display = "none";
    document.getElementById("title_resources").style.display = "none";
    document.getElementById("title_capteur").style.display = "none";
    document.getElementById("title_history").style.display = "none";
    document.getElementById("title_administration").style.display = "block";

    document.getElementById("nav_home").classList.remove("active");
    document.getElementById("nav_video").classList.remove("active");
    document.getElementById("nav_resources").classList.remove("active");
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
}
