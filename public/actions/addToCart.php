<?php
// Inclusion du fichier d'initialisation
require_once __DIR__ . '/../../src/init.php';

// Récupération de la commande de l'utilisateur
$getUserOrder = $pdo->prepare('SELECT id_order FROM Users WHERE id = ?');
$getUserOrder->execute([$user['id']]);
$userOrder = $getUserOrder->fetch()['id_order'];

// Si l'utilisateur n'a pas de commande existante
if ($userOrder === NULL) {
    // Création d'une nouvelle commande pour l'utilisateur
    $insertOrder = $pdo->prepare('INSERT INTO Orders (id_user, status) VALUES (?, ?);');
    $insertOrder->execute([$user['id'], "En panier"]);

    // Récupération de l'ID de la nouvelle commande
    $userOrder = $pdo->lastInsertId();

    // Mise à jour de l'ID de la commande dans le profil de l'utilisateur
    $setUserOrder = $pdo->prepare('UPDATE Users SET id_order = ? WHERE Users.id = ?');
    $setUserOrder->execute([$userOrder, $user['id']]);
}

// Ajout du produit à la commande
$insertProduct = $pdo->prepare('INSERT INTO Links (id_order, id_product) VALUES (?, ?);');
$insertProduct->execute([$userOrder, $_POST['productId']]);

// Redirection vers la liste des produits avec un indicateur de succès en paramètre
header('Location: /productsList.php?success=1'); // $_GET['success']
