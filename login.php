<?php
session_start();

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
                <form action="login.php" method="POST">
                    <h2>Login</h2>
                    <input type="text" name="username" placeholder="Username" id="username_login" required>
                    <input type="password" name="password" placeholder="Password" id="password_login" required>
                    <div class="form-options">
                        <label><input type="checkbox" onclick="Shown_password()">Show Password</label>
                    </div>
                    <button  type="submit" class="btn-login" name="login">LOGIN</button>
                    <p>Don't have an account? <a href="#" onclick="showRegisterForm()">Register</a></p> 
                </form>
            </div>

            <div class="form-box" id="register-form" style="display:none">
                <form action="register.php" method="POST">
                    <h2>Register</h2>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" id="password_register" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password_register" required>
                    <div class="form-options">
                        <label><input type="checkbox" onclick="Shown_password()">Show Password</label>
                    </div>
                    <button  type="submit" class="btn-register" name="register">REGISTER</button>
                    <p>Already have an account? <a href="#" onclick="showLoginForm()">Login</a></p>
            </div>
        </div>

        <script src="static/JS/mesFonction.js"></script>
        <script src="static/JS/script.js"></script>
    </body>      
</html>