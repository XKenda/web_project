<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/SignUp_style.css">
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    ?>
    <div class="container">
        <div class="form-wrapper">
            <h2 class="form-title">Create Account</h2>
            <div class="signup active">
                <form action="process_signup.php" method="POST">
                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input id="f_name" name="f_name" type="text" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input id="l_name" name="l_name" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="signup-email">Email</label>
                        <input id="signup-email" name="signup-email" type="email" required>
                    </div>

                    <div class="form-group">
                        <label for="signup-password">Password</label>
                        <input id="signup-password" name="signup-password" type="password" required>
                    </div>

                    <div class="form-group">
                        <label for="c_password">Confirm Password</label>
                        <input id="c_password" name="c_password" type="password" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">Sign Up</button>
                </form>
            </div>

            <div class="login">
                <form action="process_login.php" method="POST">
                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <input id="login-email" name="login-email" type="email" required>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input id="login-password" name="login-password" type="password" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">Login</button>
                </form>
            </div>

            <p class="toggle-text">
                <span class="signup-text">Already have an account? <a href="#" class="toggle-btn">Login</a></span>
                <span class="login-text">Don't have an account? <a href="#" class="toggle-btn">Sign Up</a></span>
            </p>
        </div>
    </div>
    <script src="js/signup.js"></script>
</body>
</html>