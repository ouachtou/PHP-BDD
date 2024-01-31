<?php
require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product_name = $_POST['product_name'];
    $comment = $_POST['comment'];
    $note = $_POST['note'];

    $userId = $_SESSION['user_id'];

    $pdoStatement = $pdo->prepare("SELECT id FROM Products WHERE name = ?");
    $pdoStatement->execute([$product_name]);
    $productId = $pdoStatement->fetchColumn();

    $pdoStatement = $pdo->prepare("SELECT L.id
    FROM Links AS L
    JOIN Orders AS O ON O.id = L.id_order
    WHERE L.id_product = ? AND O.id_user = ?");
    $pdoStatement->execute([$productId, $userId]);
    $link = $pdoStatement->fetch();

    if ($link) {
        $pdoStatement = $pdo->prepare("INSERT INTO Feedbacks (id_user, id_product, comment, note) VALUES (?, ?, ?, ?)");
        $pdoStatement->execute([$userId, $productId, $comment, $note]);

        echo "Feedback ajouté avec succès!";
    } else {
        echo "Vous ne pouvez pas laisser de feedback pour un produit non commandé.";
    }
}
