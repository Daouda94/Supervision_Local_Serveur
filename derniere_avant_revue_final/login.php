<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once 'connexion.php';
session_start();

// Redirection si déjà connecté
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// 1. Récupération et suppression immédiate du message en session (Gestion du F5)
$message = $_SESSION['error_message'] ?? '';
$form_to_show = $_SESSION['form_to_show'] ?? 'login';

unset($_SESSION['error_message']);
unset($_SESSION['form_to_show']);

# ==================== Login ====================

if (isset($_POST['login'])) {
    $usernameSaisi = trim($_POST['name'] ?? '');
    $passwordSaisi = $_POST['password'] ?? '';

    # ==================== admin/admin ====================
    if ($usernameSaisi === "admin" && $passwordSaisi === "admin") {
        $_SESSION['username'] = "admin";
        $_SESSION['login_success'] = true;
        header("Location: index.php");
        exit();
    }

    # ==================== BDD ====================

    try {
        $sql = "SELECT * FROM Loginz WHERE name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usernameSaisi]);
        $user = $stmt->fetch();

        if ($user && password_verify($passwordSaisi, $user['password'])) {
            $_SESSION['username'] = $user['name'];
            $_SESSION['login_success'] = true;
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Identifiants incorrects.";
            $_SESSION['form_to_show'] = 'login';
            header("Location: login.php");
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Erreur serveur.";
        header("Location: login.php");
        exit();
    }
}

# ==================== register ====================

if (isset($_POST['register'])) {
    $name = trim($_POST['name'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Initialisation de l'erreur
    $error = "";

    // --- VÉRIFICATION DES CRITÈRES ---
    if (empty($name) || empty($password)) {
        $error = "Tous les champs sont obligatoires.";
        $form_to_show = 'register';
    } 
    elseif (strlen($name) < 3) {
        $error = "Le nom d'utilisateur doit contenir au moins 3 caractères.";
        $form_to_show = 'register';
    }
    elseif (strlen($password) < 8) {
        $error = "Le mot de passe doit contenir au moins 8 caractères.";
        $form_to_show = 'register';
    }
    elseif (!preg_match("#[0-9]+#", $password)) {
        $error = "Le mot de passe doit contenir au moins un chiffre.";
        $form_to_show = 'register';
    }
    elseif (!preg_match("#[A-Z]+#", $password)) {
        $error = "Le mot de passe doit contenir au moins une majuscule.";
        $form_to_show = 'register';
    }
    elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
        $form_to_show = 'register';
    }

    if ($error === "") {
        try {
            $check = $pdo->prepare("SELECT COUNT(*) FROM Loginz WHERE name = ?");
            $check->execute([$name]);
            if ($check->fetchColumn() > 0) {
                $error = "Ce nom d'utilisateur est déjà utilisé.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $ins = $pdo->prepare("INSERT INTO Loginz (name, password) VALUES (?, ?)");
                $ins->execute([$name, $hashedPassword]);

                $_SESSION['signup_success'] = "Inscription réussie ! Connectez-vous.";
                $_SESSION['form_to_show'] = 'login';
                header("Location: login.php");
                exit();
            }
        } catch (Exception $e) {
            $error = "Erreur lors de l'accès à la base de données.";
        }
    }

    // Si on arrive ici, c'est qu'il y a une erreur
    $_SESSION['error_message'] = $error;
    $_SESSION['form_to_show'] = 'register';
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login/Register</title>
        <link rel="stylesheet" href="static/CSS/login.css">
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    </head>

    <body class="form-body"><div id="particles-js" class="background"></div>

        <?php 
            $alert_msg = "";
            $alert_type = "";

            // 1. On vérifie d'abord s'il y a un succès en session
            if (isset($_SESSION['signup_success'])) {
                $alert_msg = $_SESSION['signup_success'];
                $alert_type = 'alert-blue'; // Classe CSS pour le bleu
                unset($_SESSION['signup_success']); // On nettoie pour le prochain F5
            } 
            // 2. Sinon, on vérifie s'il y a une erreur
            elseif (!empty($message)) {
                $alert_msg = $message;
                $alert_type = 'alert-red'; // Classe CSS pour le rouge
            }
        ?>

        <?php if ($alert_msg): ?>
            <div id="custom-alert" class="floating-alert <?= $alert_type ?>">
                <?= htmlspecialchars($alert_msg) ?>
            </div>
        <?php endif; ?>

        <div class="container-form">
            <img src="static/ICONES/Logo_Epi94.png" alt="Logo Epi94">
            <!-- <div class="form-toggle">
                <button id="toggle-signin" class="toggle-btn active" onclick="showLoginForm()">Sign in</button>
                <button id="toggle-signup" class="toggle-btn" onclick="showRegisterForm()">Sign up</button>
            </div> -->
            <div class="form-toggle">
                <button id="toggle-signin" class="toggle-btn <?= $form_to_show !== 'register' ? 'active' : '' ?>" onclick="showLoginForm()">Sign in</button>
                <button id="toggle-signup" class="toggle-btn <?= $form_to_show === 'register' ? 'active' : '' ?>" onclick="showRegisterForm()">Sign up</button>
            </div>

            <div class="form-box active" id="login-form" style="display: <?= $form_to_show === 'register' ? 'none' : 'block' ?>;"> 
                <form action="login.php" method="post">
                    <!-- <img src="static/ICONES/account.png" alt="User Icon" class="user-icon"> -->
                    <h2>Login</h2>
                    <input type="text" name="name" placeholder="Username" id="name_login" autocomplete="off" required>
                    <input type="password" name="password" placeholder="Password" id="password_login" autocomplete="off" required>
                    <div class="form-options">
                        <label><input type="checkbox" onclick="Shown_password()">Show Password</label>
                    </div>
                    <button  type="submit" class="btn-login" name="login">LOGIN</button>
                </form>
            </div>

            <div class="form-box" id="register-form" style="display:<?= $form_to_show === 'register' ? 'block' : 'none' ?>;">
                <form action="login.php" method="post">
                    <h2>Register</h2>
                    <input type="text" name="name" placeholder="Username"  id="name_register" autocomplete="off" required>
                    <input type="password" name="password" placeholder="Password" id="password_register" autocomplete="off" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password_register" autocomplete="off" required>
                    <div class="form-options">
                        <label><input type="checkbox" onclick="Shown_password()">Show Password</label>
                    </div>
                    <button  type="submit" class="btn-register" name="register">REGISTER</button>
                </form>
            </div>
        </div>
    

        <script src="static/JS/mesFonction.js"></script>
        <script src="static/JS/script.js"></script>
    </body>      
</html>