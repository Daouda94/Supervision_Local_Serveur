<?php

// try{
//     $pdo = new PDO('mysql:host=localhost;dbname=projet_essridi;charset=utf8','essridi','essridi');
// }catch (PDOException $e){
//     die ($e);
// }

// $req_type = $_SERVER['REQUEST_METHOD'];

// if(isset($_SERVER['PATH_INFO'])){
//     $cheminURL = $_SERVER['PATH_INFO'];
//     $cheminURL_tableau = explode('/', $cheminURL);
// }

// if($req_type == 'GET'){
//     if($cheminURL_tableau[1] == 'loginz'){
//         $req = "SELECT name, password FROM loginz";
//         $reqpreparer = $pdo->prepare($req);
//         $reqpreparer->execute();
//         $reponse = $reqpreparer->fetchAll(PDO::FETCH_ASSOC);
//         print_r(json_encode($reponse));
//     }
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

?>