<?php
require_once __DIR__ . '/../../src/init.php';

try {
    $getUserOrder = $pdo->prepare('SELECT id_order FROM Users WHERE id = ?');
    $getUserOrder->execute([$_SESSION['user_id']]);
    $userOrder = $getUserOrder->fetch()['id_order'];
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
};

try {
    $insertProduct = $pdo->prepare('INSERT INTO Links (id_order, id_product) VALUES (?, ?);');
    $insertProduct->execute([$userOrder, $_POST['productId']]);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
};

header('Location: /productsList.php?success=1'); // $_GET['success']
