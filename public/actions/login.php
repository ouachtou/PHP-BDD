<?php 

session_unset();
session_destroy();
session_abort();
$ok = 0;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $state= $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $state->execute();
    $user = $state ->fetch();
    if ($user && password_verify($password, $user['password'])){
        session_start();
        $_SESSION['user_id'] = $user['id'];
    }
    else{
        echo('Mauvais identifiants');
    }
}

// require ici

session_start();

var_dump($_POST, $ok);

// traitement classique
