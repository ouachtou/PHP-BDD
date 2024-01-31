<?php 
require_once __DIR__ . '/../../src/init.php';

$ok = 0;
$db = initDB();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $state= $db->prepare('SELECT * FROM users WHERE email = :email');
    $state->execute(['email' => $email]);
    $user = $state ->fetch();
    if ($user && password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        header('Location: /index.php');
    }
    else{
        $_SESSION['error_message'] = 'Mauvais identifiants';
        header('Location: /login.php');
        die();
    }
}

// require ici


var_dump($_POST, $ok);

// traitement classique
