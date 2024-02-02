<?php
require_once __DIR__ . '/../../src/init.php';

// Vérifie si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recherche l'ID du lien entre le produit et la commande associée à l'utilisateur
    $pdoStatement = $pdo->prepare("SELECT L.id
    FROM Links AS L
    JOIN Orders AS O ON O.id = L.id_order
    WHERE L.id_product = ? AND O.id_user = ?");
    $pdoStatement->execute([$_POST['id'], $user['id']]);
    $link = $pdoStatement->fetch();

    // Si le lien existe
    if ($link) {
        // Ajoute le feedback dans la base de données
        $pdoStatement = $pdo->prepare("INSERT INTO Feedbacks (id_user, id_product, comment, note) VALUES (?, ?, ?, ?)");
        $pdoStatement->execute([$user['id'], $_POST['id'], $_POST['comment'], $_POST['note']]);

        header('Location: /productsList.php'); // Redirige l'utilisateur
        die(); // Arrête l'exécution du script
    } else {
        header('Location: /productsList.php'); // Redirige l'utilisateur
        die(); // Arrête l'exécution du script
    }
}
