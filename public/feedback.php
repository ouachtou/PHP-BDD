<?php
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Feedback</title>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <h2>Ajouter un Feedback</h2>

    <form method="post" action="/actions/feedback.php">
        <input placeholder="nom du produit" type="text" name="product_name" required>
        <textarea placeholder="Commentaire" name="comment" rows="4" required></textarea>
        <input placeholder="Note" type="number" name="note" min="1" max="10" required>
        <button type="submit">Ajouter le Feedback</button>
    </form>
</body>