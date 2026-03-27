// function recupererDonneesUtilisateur(){
//       const xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//       if (this.readyState == 4 && this.status == 200) {
//         var reponseAPI=JSON.parse(this.responseText);
//     var table="<div ><table class='tableau_statistique '><tr class='centrer'><th>Numéro d'accès</th><th>Date</th></tr>";
        
//     for(let i=0;i<reponseAPI.length;i++){
//       table+="<tr class='centrer'>";
//       let donneesUser=reponseAPI[i];
//       table+="<td>"+donneesUser.idutilisateur+"</td>";
//       table+="<td>"+donneesUser.nom+"</td>";
//       table+="<td>"+donneesUser.prenom+"</td>";
//       table+="<td>"+donneesUser.email+"</td>";
//       table+="<td>"+donneesUser.naissance+"</td>";
//       table+="<td>"+donneesUser.pseudo+"</td>";
//       table+="<td>"+donneesUser.mdp+"</td>";
//       table+="</tr>";
//     }
//       table+="</table></div>";
//       console.log(table);
//       document.getElementById("section").innerHTML=table;

//   }
// }
//     xhttp.open('GET','http://127.0.0.1/SW04_eleve/rest.php/utilisateur');
//     xhttp.send();
// }
// if($req_type == 'GET'){
//     if($cheminURL_tableau[1] == 'historique'){
//         $req = "SELECT numeroacces, horaire, autoriser FROM historique";
//         $reqpreparer = $pdo->prepare($req);
//         $reqpreparer->execute();
//         $reponse = $reqpreparer->fetchAll(PDO::FETCH_ASSOC);
//         print_r(json_encode($reponse));
//     }
// }


/* =================== recuperation et affichage historique =================== */
if(document.getElementById("nav_history"))
    document.getElementById("nav_history").addEventListener("click", recupererHistorique);

function recupererHistorique(){
  const xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var reponseAPI = JSON.parse(this.responseText);
      var table = "<div><table class='tableau_statistique'><tr class='centrer'><th>Numéro d'accès</th><th>Date</th></tr>";

      for(let i = 0; i < reponseAPI.length; i++){
        table += "<tr class='centrer'>";
        let historique = reponseAPI[i];
        table += "<td>" + historique.numeroacces + "</td>";
        table += "<td>" + historique.horaire + "</td>";
        table += "</tr>";
      }
      table += "</table></div>";

      document.getElementById("windows_history").innerHTML = table;
    }
  }

  xhttp.open('GET', 'http://172.20.21.39:8080/BIG_essridi_PROJET/haha2.php/historique');
  xhttp.send();
}
