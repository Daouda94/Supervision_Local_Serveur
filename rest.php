<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$host="localhost";
$dbname="projet_essridi";
$username="essridi";
$password="essridi";
$port = '8080';

// ======================= Connexion a la base de donnees ====================== //
try {
        // Connexion à la BD
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
}catch (PDOException $erreur){
    http_response_code(500);
    echo json_encode(["erreur" => "Connexion base de données échouée"]);
    exit;
}

// if(isset($_SERVER['PATH_INFO'])) {
//     $cheminURL = $_SERVER['PATH_INFO' ];
//     $cheminURL_tableau = explode ('/', $cheminURL);
// }

// // ======================= Login ====================== //
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($cheminURL_tableau[1]) && $cheminURL_tableau[1] === "connexion") {
//         $json = file_get_contents('php://input');
//         $donneesRecues = json_decode($json, true);
        
//         $usernameSaisi = $donneesRecues['name'] ?? '';
//         $passwordSaisi = $donneesRecues['password'] ?? '';

//         if (!empty($usernameSaisi) && !empty($passwordSaisi)) {
//             $requete = $pdo->prepare("SELECT * FROM Loginz WHERE name = ?");
//             $requete->execute([$usernameSaisi]);
//             $user = $requete->fetch(PDO::FETCH_ASSOC); 
            
//             if ($user && $passwordSaisi, $user['password']) {
//                 session_start();
//                 $_SESSION['username'] = $user['name']; 
//                 echo json_encode(["success" => true, "message" => "Connexion réussie"]);
//             } else {
//                 http_response_code(401);
//                 echo json_encode(["success" => false, "message" => "Identifiants invalides"]);
//             }
//         }
//         exit;
//     }
// }

// // ======================= Register ======================= //
// if ($_SERVER['REQUEST_METHOD'] === 'POST'){
//     if (isset($cheminURL_tableau[1]) ===  "inscription") {
//         $data = json_decode(file_get_contents('php://input'), true);
//         $username = $data['name']?? '';
//         $password = $data['password']?? '';
//         $password_confirm = $data['password_confirm']?? '';

//         $password = !empty($data['password'])
//             ? password_hash($data['password'], PASSWORD_DEFAULT): '';

//         if (!$password || !$password_confirm){
//             http_response_code(400);
//             echo json_encode(['message' => 'Veuillez remplir tous les champs']);
//             exit;
//         }
//         if ($password !== $password_confirm) {
//             http_response_code(400);
//             echo json_encode(['message' => 'Les mots de passe ne correspondent pas']);
//             exit;
//         }
//         if (strlen($password) < 8 ||
//         !preg_match('/[A-Z]/', $password) ||
//         !preg_match('/[a-z]/', $password) ||
//         !preg_match('/[0-9]/', $password) ||
//         !preg_match('/\d/', $password) || preg_match('/[\w_]/', $password)){
//             http_response_code(400);
//             echo json_encode(['message' => 'Le mot de passe doit comporter au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial']);
//             exit;
//         }

//         $password_hash = password_hash($password, PASSWORD_DEFAULT);
//         $requete = $pdo->prepare("SELECT * FROM loginz WHERE name = ?");
//         $requete->execute([$username]);
//         $username = $requete->fetch(PDO::FETCH_ASSOC);
//         if ($username) {
//             http_response_code(400);
//             echo json_encode(['message' => 'Nom d\'utilisateur déjà utilisé']);
//             exit;
//         }
//         $requete = $pdo->prepare("INSERT INTO loginz (name, password) VALUES (?, ?)");
//         $requete->execute([$username, $password_hash]);
//         echo json_encode(['message' => 'Inscription réussie']);
    
//     }
// }

?>
