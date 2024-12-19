<?php
session_start();
require_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['login-email']);
    $password = $_POST['login-password'];

    // Basic validation
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: sign_up.php");
        exit();
    }

    try {
        // Get user from database
        $stmt = $pdo->prepare("SELECT id, first_name, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['first_name'];
                
                // Redirect to home page
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "Invalid email or password";
                header("Location: sign_up.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Invalid email or password";
            header("Location: sign_up.php");
            exit();
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "Login failed. Please try again.";
        header("Location: sign_up.php");
        exit();
    }
}
?> 