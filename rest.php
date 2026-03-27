<?php

$host="172.20.21.39";
$dbname="projet_essridi";
$username="rfidtruc2";
$password="";

  // ======================= Connexion a la base de donnees ====================== //
try {
        // Connexion à la BD
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
}catch (PDOException $e){
    http_response_code(500);
    echo json_encode(['message' => 'Erreur de connexion à la base de données']);
    exit;
}

 // ======================= Login ====================== //

if ($req_type == 'POST') {
    if (isset($cheminURL_tableau[0]) && $cheminURL_tableau[0] === "connexion") {
        $json = file_get_contents('php://input');
        $donneesRecues = json_decode($json, true);
        
        $nameSaisi = $donneesRecues['name'] ?? '';
        $passwordSaisi = $donneesRecues['password'] ?? '';

        if (!empty($nameSaisi) && !empty($passwordSaisi)) {
            // On cherche l'utilisateur par son nom
            $requete = $pdo->prepare("SELECT * FROM loginz WHERE name = ?");
            $requete->execute([$nameSaisi]);
            $user = $requete->fetch(PDO::FETCH_ASSOC); 
            
            // Vérification du mot de passe (haché ou non selon ton choix en BDD)
            if ($user && password_verify($passwordSaisi, $user['password'])) {
                echo json_encode([
                    "status" => "success",
                    "user"   => $user['name'],
                    "role"   => $user['role']
                ]);
            } else {
                http_response_code(401);
                echo json_encode(["status" => "error", "message" => "Identifiants incorrects"]);
            }
        }
        exit;
    }
}


// ======================= Inscription ======================= //

    if (isset($cheminURL_tableau[0]) && $cheminURL_tableau[0] === "inscription") {
        $data = file_get_contents('php://input');
        $donneesRecues = json_decode($json, true);
        $username = $donneesRecues['name']?? '';
        $password = $donneesRecues['password']?? '';
        $password_confirm = $donneesRecues['password_confirm']?? '';

        if (!$password || !$password_confirm){
            http_response_code(400);
            echo json_encode(['message' => 'Veuillez remplir tous les champs']);
            exit;
        }
        if ($password !== $password_confirm) {
            http_response_code(400);
            echo json_encode(['message' => 'Les mots de passe ne correspondent pas']);
            exit;
        }
        if (strlen($password) < 8 ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/\d/', $password) || preg_match('/[\w_]/', $password)){
            http_response_code(400);
            echo json_encode(['message' => 'Le mot de passe doit comporter au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial']);
            exit;
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $requete = $pdo->prepare("SELECT * FROM utilisateur WHERE name = ?");
        $requete->execute([$username]);
        $username = $requete->fetch(PDO::FETCH_ASSOC);
        if ($username) {
            http_response_code(400);
            echo json_encode(['message' => 'Nom d\'utilisateur déjà utilisé']);
            exit;
        }
        $requete = $pdo->prepare("INSERT INTO utilisateur (name, password) VALUES (?, ?)");
        $requete->execute([$username, $password_hash]);
        echo json_encode(['message' => 'Inscription réussie']);
    
    }

?>