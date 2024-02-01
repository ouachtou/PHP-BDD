<?php
require_once __DIR__ . '/../../src/init.php';

$getUserOrder = $pdo->prepare('SELECT id_order FROM Users WHERE id = ?');
$getUserOrder->execute([$_SESSION['user_id']]);
$userOrder = $getUserOrder->fetch()['id_order'];

if ($userOrder === NULL) {
    $insertOrder = $pdo->prepare('INSERT INTO Orders (id_user, status) VALUES (?, ?);');
    $insertOrder->execute([$_SESSION['user_id'], "En panier"]);

    $userOrder = $pdo->lastInsertId();

    $setUserOrder = $pdo->prepare('UPDATE Users SET id_order = ? WHERE Users.id = ?');
    $setUserOrder->execute([$userOrder, $_SESSION['user_id']]);
}

$insertProduct = $pdo->prepare('INSERT INTO Links (id_order, id_product) VALUES (?, ?);');
$insertProduct->execute([$userOrder, $_POST['productId']]);

header('Location: /productsList.php?success=1'); // $_GET['success']
