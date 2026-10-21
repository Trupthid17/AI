<?php
session_start();
require_once __DIR__ . '/../config/db.php';

function registerUser(string $fullName, string $email, string $password): bool
{
    global $pdo;

    $exists = $pdo->prepare('SELECT id FROM users WHERE email = :email');
    $exists->execute(['email' => $email]);
    if ($exists->fetch()) {
        return false;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (full_name, email, password_hash) VALUES (:full_name, :email, :password_hash)');
    return $stmt->execute([
        'full_name' => $fullName,
        'email' => $email,
        'password_hash' => $hash,
    ]);
}

function loginUser(string $email, string $password): bool
{
    global $pdo;

    $stmt = $pdo->prepare('SELECT id, password_hash FROM users WHERE email = :email LIMIT 1');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return false;
    }

    if (password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    }

    return false;
}

function logoutUser(): void
{
    session_unset();
    session_destroy();
}
