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

$st2 = $pdo->prepare('UPDATE users SET email = :email, name = :name, first_name = :first_name, phone_number = :phone_number, adress = :adress WHERE id = :id_user');
$st2->execute([
    ':email' => $_POST['email'],
    ':name' => $_POST['name'],
    ':first_name' => $_POST['first_name'],
    ':phone_number' => $_POST['number'],
    ':adress' => $_POST['adress'],
    ':id_user' => $_SESSION['user_id']
]);

header('Location: /shoppingCart.php?success=1'); // $_GET['success']