<?php
session_start();
require_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['f_name']);
    $lastName = trim($_POST['l_name']);
    $email = trim($_POST['signup-email']);
    $password = $_POST['signup-password'];
    $confirmPassword = $_POST['c_password'];

    // Basic validation
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: sign_up.php");
        exit();
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match";
        header("Location: sign_up.php");
        exit();
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "Email already exists";
        header("Location: sign_up.php");
        exit();
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Insert new user
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$firstName, $lastName, $email, $hashedPassword]);

        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['user_name'] = $firstName;
        
        // Redirect to home page
        header("Location: index.php");
        exit();

    } catch(PDOException $e) {
        $_SESSION['error'] = "Registration failed. Please try again.";
        header("Location: sign_up.php");
        exit();
    }
}
?> 