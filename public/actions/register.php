<?php
require_once __DIR__ . '/../../src/init.php';
// $pdo est dispo !

if (empty($_POST['email'])) {
    // error
    $_SESSION['error_message'] = 'Champs email vide.';
    header('Location: /register.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['password'])) {
    // error
    $_SESSION['error_message'] = 'Champs password vide.';
    header('Location: /register.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    $_SESSION['error_message'] = "L'email est invalide";
    header('Location: /register.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (strlen($_POST['password']) < 6) {
    $_SESSION['error_message'] = "Le mot de passe est trop petit (<6)";
    header('Location: /register.php'); // redirige utilisateur
    die(); // stop execution du script
}

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// verifier que l'email n'est pas deja en DB
$st1 = $pdo->prepare('SELECT * FROM users WHERE email = ? OR first_name = ?');
$st1->execute([$_POST['email'], $_POST['first_name']]);
$alreadyExists = $st1->fetch(PDO::FETCH_ASSOC);
// $alreadyExists = [ 'username' => 'edouard', .... ];
if ($alreadyExists != false) {
    $_SESSION['error_message'] = 'Déjà inscrit.';
    header('Location: /register.php'); // redirige utilisateur
    die(); // stop execution du script
}

// INSERT
$st2 = $pdo->prepare('INSERT INTO users(email, password, first_name) VALUES(?, ?, ?)');
$st2->execute([$_POST['email'], $password, $_POST['first_name']]);

// recup id utilisateur
$_SESSION['user_id'] = $pdo->lastInsertId(); // connecté pour plus tard

$st3 = $pdo->prepare('INSERT INTO Orders(id_user, status) VALUES(?, ?)');
$st3->execute([$_SESSION['user_id'], 'New']);

header('Location: /index.php?success=1'); // $_GET['success']
