<?php
session_start();

require_once __DIR__ . '/db.php';

// require des utilitaires *utils*

// require les classes

$user = false;
if (isset($_SESSION['user_id'])) {
    $getUser = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $getUser->execute([$_SESSION['user_id']]);
    $user = $getUser->fetch(PDO::FETCH_ASSOC);
}
