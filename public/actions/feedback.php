<?php
require_once __DIR__ . '/../../src/init.php';

// Vérifie si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recherche l'ID du produit en fonction du nom
    $pdoStatement = $pdo->prepare("SELECT id FROM Products WHERE name = ?");
    $pdoStatement->execute([$_POST['product_name']]);
    $productId = $pdoStatement->fetchColumn();

    // Recherche l'ID du lien entre le produit et la commande associée à l'utilisateur
    $pdoStatement = $pdo->prepare("SELECT L.id
    FROM Links AS L
    JOIN Orders AS O ON O.id = L.id_order
    WHERE L.id_product = ? AND O.id_user = ?");
    $pdoStatement->execute([$productId, $user['id']]);
    $link = $pdoStatement->fetch();

    // Si le lien existe
    if ($link) {
        // Ajoute le feedback dans la base de données
        $pdoStatement = $pdo->prepare("INSERT INTO Feedbacks (id_user, id_product, comment, note) VALUES (?, ?, ?, ?)");
        $pdoStatement->execute([$user['id'], $productId, $_POST['comment'], $_POST['note']]);

        // Affiche un message de succès
        echo "Feedback ajouté avec succès!";
        header('Location: /feedback.php'); // Redirige l'utilisateur
    } else {
        // Affiche un message d'erreur et redirige l'utilisateur
        echo "Vous ne pouvez pas laisser de feedback pour un produit non commandé.";
        header('Location: /feedback.php'); // Redirige l'utilisateur
        die(); // Arrête l'exécution du script
    }
}
