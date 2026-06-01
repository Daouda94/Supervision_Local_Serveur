/* =================== recuperation et affichage historique =================== */
if(document.getElementById("nav_history"))
    document.getElementById("nav_history").addEventListener("click", recupererHistorique);

function recupererHistorique(){
  const xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var reponseAPI = JSON.parse(this.responseText);
      /* -----tableau windows historique----- */
      var table = "<div><table class='tableau_historique'><tr class='centrer'><th>Numéro d'accès</th><th>Date</th><th>Autorisé</th></tr>";
      
      for(let i = 0; i < reponseAPI.length; i++){
        table += "<tr class='centrer'>";
        let historique = reponseAPI[i];
        table += "<td>" + historique.numeroacces + "</td>";
        table += "<td>" + historique.horaire + "</td>";
        table += "<td>" + historique.autoriser + "</td>";
        table += "</tr>";
      }
      table += "</table></div>";

      /* -----widget rfid----- */
      if (reponseAPI.length > 0) {
        // On récupère le dernier élément du tableau
        let dernier = reponseAPI[reponseAPI.length - 1];
        
        // On met à jour les balises du widget avec les IDs créés
        document.getElementById("widget_rfid_numero").innerText = dernier.numeroacces;
        document.getElementById("widget_rfid_date").innerText = dernier.horaire;
      }

      document.getElementById("table-historique").innerHTML = table;

    }
  }

  xhttp.open('GET', 'http://172.20.21.39:8080/BIG_essridi_PROJET/haha2.php/historique');
  xhttp.send();
  console.log(document.getElementById("windows_history"));
}

/* =================== recuperation et affichage loginz =================== */
if(document.getElementById("admin_table"))
    document.getElementById("admin_table").addEventListener("click", recupererLoginz);


// function recupererLoginz(){
//   const xhttp = new XMLHttpRequest();
  
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       var reponseAPI = JSON.parse(this.responseText);
//       var table = "<div><table class='tableau_statistique'><tr class='centrer'><th>ID</th><th>Utilisateur</th><th>Password</th><th>Role</th><th>Action</th></tr>";

//       for(let i = 0; i < reponseAPI.length; i++){
//         table += "<tr class='centrer'>";
//         let user = reponseAPI[i];

//         table += "<td>" + user.id + "</td>";
//         table += "<td>" + user.name + "</td>";
//         table += "<td>" + user.password + "</td>";
//         table += "<td>" + user.role + "</td>";
//         table += "<td><button onclick='supprimerUser(" + user.id + ")'>Supprimer</button></td>";

//         table += "</tr>";
//       }

//       table += "</table></div>";
//       document.getElementById("admin_table").innerHTML = table;
//     }
//   }

//   xhttp.open('GET', 'http://172.20.21.39:8080/BIG_essridi_PROJET/haha2.php/loginz');
//   xhttp.send();
// }

/* =================== supprimer user de la base de données =================== */
// function supprimerUser(id){
//   const xhttp = new XMLHttpRequest();

//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       recupererLoginz();
//     }
//   }

//   xhttp.open('DELETE', 'http://172.20.21.39:8080/BIG_essridi_PROJET/haha2.php/loginz' + id);
//   xhttp.send();
// }
