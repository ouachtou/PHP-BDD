<?php
require_once __DIR__ . '/../../src/init.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $getUser = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $getUser->execute([$_POST['email']]);
    $user = $getUser->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['admin'] = $user['admin'];
        header('Location: /index.php');
    } else {
        $_SESSION['error_message'] = 'Mauvais identifiants';
        header('Location: /login.php');
        die();
    }
}
