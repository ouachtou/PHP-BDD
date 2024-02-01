<?php
require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdoStatement = $pdo->prepare("SELECT id FROM Products WHERE name = ?");
    $pdoStatement->execute([$_POST['product_name']]);
    $productId = $pdoStatement->fetchColumn();

    $pdoStatement = $pdo->prepare("SELECT L.id
    FROM Links AS L
    JOIN Orders AS O ON O.id = L.id_order
    WHERE L.id_product = ? AND O.id_user = ?");
    $pdoStatement->execute([$productId, $user['id']]);
    $link = $pdoStatement->fetch();

    if ($link) {
        $pdoStatement = $pdo->prepare("INSERT INTO Feedbacks (id_user, id_product, comment, note) VALUES (?, ?, ?, ?)");
        $pdoStatement->execute([$user['id'], $productId, $_POST['comment'], $_POST['note']]);

        echo "Feedback ajouté avec succès!";
        header('Location: /feedback.php'); // redirige utilisateur
    } else {
        echo "Vous ne pouvez pas laisser de feedback pour un produit non commandé.";
        header('Location: /feedback.php'); // redirige utilisateur
        die(); // stop execution du script
    }
}
