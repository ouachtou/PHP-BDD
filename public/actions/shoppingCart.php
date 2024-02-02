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

if (empty($_POST['address'])) {
    $_SESSION['error_message'] = "Invalide";
    header('Location: /shoppingCart.php'); // redirige utilisateur
    die(); // stop execution du script
}

// verifier que l'email n'est pas deja en DB et correspond à un autre utlisateur
$checkMail = $pdo->prepare('SELECT * FROM Users WHERE email = ? ');
$checkMail->execute([$_POST['email']]);
$alreadyExists = $checkMail->fetch(PDO::FETCH_ASSOC);

// $alreadyExists = [ 'username' => 'edouard', .... ];
if ($alreadyExists == false) {
    $_SESSION['error_message'] = "Adresse mail différente de l'inscription.";
    header('Location: /shoppingCart.php'); // redirige utilisateur
    die(); // stop execution du script
}

// UPDATE
$updateUser = $pdo->prepare('UPDATE Users SET email = ?, name = ?, first_name = ?, phone_number = ?, address = ? WHERE id = ?');
$updateUser->execute([$_POST['email'], $_POST['name'], $_POST['first_name'], $_POST['number'], $_POST['address'], $user['id']]);

// Set order's status to "sent" 
$updateStatus = $pdo->prepare('UPDATE Orders SET status = "Sent" WHERE status = "New" AND id IN (SELECT id_order FROM Users WHERE id = ?)');
$updateStatus->execute([$user['id']]);

// Set user's order ID to NULL 
$pdo->exec('UPDATE Users SET id_order = NULL');


header('Location: /shoppingCart.php?success=1'); // $_GET['success']