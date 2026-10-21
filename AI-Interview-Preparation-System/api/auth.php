<?php
session_start();
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';

    if ($type === 'register') {
        $fullName = $_POST['full_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (registerUser($fullName, $email, $password)) {
            $_SESSION['message'] = 'Registration successful. Please log in.';
            header('Location: ../index.php');
            exit;
        }

        $_SESSION['message'] = 'Email already exists.';
        header('Location: ../index.php');
        exit;
    }

    if ($type === 'login') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (loginUser($email, $password)) {
            header('Location: ../dashboard.php');
            exit;
        }

        $_SESSION['message'] = 'Invalid email or password.';
        header('Location: ../index.php');
        exit;
    }
}

header('Location: ../index.php');
