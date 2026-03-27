<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once 'rest.php';

session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


# ==================== Login ====================
$message = '';

if (isset($_POST['login'])) {
    $usernameSaisi = $_POST['name'] ?? '';
    $passwordSaisi = $_POST['password'] ?? '';

    # ==================== admin/admin ====================
    if ($usernameSaisi === "admin" && $passwordSaisi === "admin") {
        $_SESSION['username'] = "admin";
        header("Location: index.php");
        exit();
    }

    # ==================== BDD ====================
    try {
        $sql = "SELECT * FROM Loginz WHERE name = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usernameSaisi]);
        $user = $stmt->fetch();

        if ($user && ($passwordSaisi === $user['password'])) {
            $_SESSION['username'] = $user['name'];
            header("Location: index.php");
            exit();
        } else {
            $message = "Identifiants incorrects.";
        }
    } catch (Exception $e) {
        $message = "Erreur technique : " . $e->getMessage();
    }
}

# ==================== register ====================
// require_once 'config.php';
// $message = '';

// if (isset($_POST['username']) && isset($_POST['password'])) {
//     $username = $_POST['username'];
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//     $sql = "INSERT INTO loginz (username, password) VALUES (:username, :password)";
//     $stmt = $pdo->prepare($sql);
//     $result = $stmt->execute(['username' => $username, 'password' => $password]);

//     if ($result) {
//         $message = 'Inscription réussie!';
//         header('Location: login.php');
//     } else {
//         $message = 'Erreur lors de l\'inscription.';
//     }
// }

# ==================== (ancien formulaire  admin/admin) ====================
// if (isset($_POST['login'])) {
//     $usernameSaisi = $_POST['name'];
//     $passwordSaisi = $_POST['password'];

    // if ($usernameSaisi === "admin" && $passwordSaisi === "admin") {
    //     $_SESSION['username'] = $usernameSaisi; // On crée la session
    //     header("Location: index.php");      // On redirige vers l'index
    //     exit();
    // } else {
    //     $error = "Mauvais identifiants (Utilise admin / admin)";
    // }
// }

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

        <div class="container-form">

            <div class="form-box active" id="login-form"> 
                <form action="login.php" method="post">
                    <h2>Login</h2>
                        <?php if (!empty($message)): ?>
                            <p style="color:red"><?= $message ?></p>
                        <?php endif; ?>
                    <input type="text" name="name" placeholder="Username" id="name_login" required>
                    <input type="password" name="password" placeholder="Password" id="password_login" required>
                    <div class="form-options">
                        <label><input type="checkbox" onclick="Shown_password()">Show Password</label>
                    </div>
                    <button  type="submit" class="btn-login" name="login">LOGIN</button>
                    <p>Don't have an account? <a href="#" onclick="showRegisterForm()">Register</a></p> 
                </form>
            </div>

            <div class="form-box" id="register-form" style="display:none">
                <form action="register.php" method="post">
                    <h2>Register</h2>
                    <?php if (!empty($message)): ?>
                        <p style="color:red"><?= $message ?></p>
                    <?php endif; ?>

                    <input type="text" name="name" placeholder="Username"  id="name_register"required>
                    <input type="password" name="password" placeholder="Password" id="password_register" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password_register" required>
                    <div class="form-options">
                        <label><input type="checkbox" onclick="Shown_password()">Show Password</label>
                    </div>
                    <button  type="submit" class="btn-register" name="register">REGISTER</button>
                    <p>Already have an account? <a href="#" onclick="showLoginForm()">Login</a></p>
                </form>
            </div>
        </div>
    

        <script src="static/JS/mesFonction.js"></script>
        <script src="static/JS/script.js"></script>
    </body>      
</html>