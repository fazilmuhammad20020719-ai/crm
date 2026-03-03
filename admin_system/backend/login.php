<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['login_error'] = "Please enter both username and password.";
        header("Location: ../public/index.php");
        exit();
    }

    try {
        $stmt = $conn->prepare("SELECT id, username, password FROM admins WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            // Login success
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_username'] = $user['username'];

            // Redirect to dashboard
            header("Location: ../public/dashboard.php");
            exit();
        } else {
            // Login failed
            $_SESSION['login_error'] = "Invalid username or password.";
            header("Location: ../public/index.php");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['login_error'] = "System error. Please try again later.";
        header("Location: ../public/index.php");
        exit();
    }
} else {
    // Not a POST request
    header("Location: ../public/index.php");
    exit();
}
?>