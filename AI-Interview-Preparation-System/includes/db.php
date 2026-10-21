<?php
require_once __DIR__ . '/../config/db.php';

function getDb(): PDO
{
    global $pdo;
    return $pdo;
}

function userIsLoggedIn(): bool
{
    return isset($_SESSION['user_id']);
}

function redirectIfNotLoggedIn(): void
{
    if (!userIsLoggedIn()) {
        header('Location: index.php');
        exit;
    }
}
