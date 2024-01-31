<?php
require_once __DIR__ . '/../../src/init.php';
// $pdo est dispo !

if (empty($_POST['email'])) {
    // error
    $_SESSION['error_message'] = 'Champs email vide.';
    header('Location: /shoppingCart.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['name'])) {
    // error
    $_SESSION['error_message'] = 'Champs name vide.';
    header('Location: /shoppingCart.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['first_name'])) {
    // error
    $_SESSION['error_message'] = 'Champs first_name vide.';
    header('Location: /shoppingCart.php'); // redirige utilisateur
    die(); // stop execution du script
}


if (strlen($_POST['number']) < 10) {
    $_SESSION['error_message'] = "Le numéro est trop petit (<10)";
    header('Location: /shoppingCart.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['adress'])) {
    $_SESSION['error_message'] = "Invalide";
    header('Location: /shoppingCart.php'); // redirige utilisateur
    die(); // stop execution du script
}

// verifier que l'email n'est pas deja en DB et correspond à un autre utlisateur
$st1 = $pdo->prepare('SELECT * FROM users WHERE email = ? ');
$st1->execute([$_POST['email']]);
$alreadyExists = $st1->fetch(PDO::FETCH_ASSOC);

// $alreadyExists = [ 'username' => 'edouard', .... ];
if ($alreadyExists == false) {
    $_SESSION['error_message'] = "Adresse mail différente de l'inscription.";
    header('Location: /shoppingCart.php'); // redirige utilisateur
    die(); // stop execution du script
}

// UPDATE

$st2 = $pdo->prepare('UPDATE users SET email = ?, name = ?, first_name = ?, phone_number = ?, adress = ? WHERE id = ?');
$st2->execute([$_POST['email'], $_POST['name'], $_POST['first_name'], $_POST['number'], $_POST['adress'], $_SESSION['user_id']]);

header('Location: /shoppingCart.php?success=1'); // $_GET['success']