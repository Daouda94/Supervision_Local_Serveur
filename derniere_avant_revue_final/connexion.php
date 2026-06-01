<?php

$host="localhost";
$dbname="projet_essridi";
$username="dcisse";
$password="Daouda94";
$port = '3306';
// $port = '8080';

// ======================= Connexion a la base de donnees ====================== //
try {
        // Connexion à la BD
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
}catch (PDOException $erreur){
    http_response_code(500);
    echo json_encode(["erreur" => "Connexion base de données échouée"]);
    exit;
}

?>
