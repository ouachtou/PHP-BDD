<?php

/**
 * Vérifie les informations de connexion et redirige l'utilisateur en fonction du résultat.
 * Si les identifiants sont valides, l'utilisateur est redirigé vers la page d'accueil.
 * Sinon, un message d'erreur est enregistré et l'utilisateur est redirigé vers la page de connexion.
 */

require_once __DIR__ . '/../../src/init.php';

// Vérifie si les paramètres 'email' et 'password' sont définis dans la requête POST
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Prépare et exécute une requête pour récupérer l'utilisateur correspondant à l'adresse e-mail
    $getUser = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $getUser->execute([$_POST['email']]);
    $user = $getUser->fetch();

    // Vérifie si l'utilisateur existe et que le mot de passe correspond
    if ($user && password_verify($_POST['password'], $user['password'])) {
        // Authentification réussie : enregistre l'ID de l'utilisateur dans la session
        $_SESSION['user_id'] = $user['id'];
        header('Location: /index.php'); // Redirige vers la page d'accueil
    } else {
        // Authentification échouée : enregistre un message d'erreur et redirige vers la page de connexion
        $_SESSION['error_message'] = 'Mauvais identifiants';
        header('Location: /login.php');
        die(); // Arrête l'exécution du script
    }
}
