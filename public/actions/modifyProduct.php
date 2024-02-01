<?php
require_once __DIR__ . '/../../src/init.php';
// $pdo est dispo !

if (empty($_POST['name'])) {
    // error
    $_SESSION['error_message'] = 'Name field is empty.';
    header('Location: /modifyProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['type'])) {
    // error
    $_SESSION['error_message'] = 'Type field is empty.';
    header('Location: /modifyProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

$getProduct = $pdo->prepare('SELECT * FROM products WHERE name = ? AND type = ?');
$getProduct->execute([$_POST['name'], $_POST['type']]);
$product = $getProduct->fetch(PDO::FETCH_ASSOC);

if (empty($product)) {
    $_SESSION['error_message'] = 'No product found.';
    header('Location: /modifyProduct.php'); // redirige utilisateur
    die();
}

if (empty($_POST['price'])) {
    $_POST['price'] = $product['price'];
}

if (!is_numeric($_POST['price'])) {
    // error
    $_SESSION['error_message'] = 'Price must be a number.';
    header('Location: /modifyProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['quantity'])) {
    $_POST['quantity'] = $product['quantity'];
}

if (!is_numeric($_POST['quantity'])) {
    // error
    $_SESSION['error_message'] = 'Quantity must be a number.';
    header('Location: /modifyProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['reduction'])) {
    $_POST['reduction'] = $product['reduction'];
} else {
    if (!is_numeric($_POST['reduction'])) {
        // error
        $_SESSION['error_message'] = 'Reduction must be a number.';
        header('Location: /modifyProduct.php'); // redirige utilisateur
        die(); // stop execution du script
    }
}

$updateProduct = $pdo->prepare('UPDATE Products SET price = ?, quantity = ?, reduction = ? WHERE name = ? AND type = ?');
$updateProduct->execute([$_POST['price'], $_POST['quantity'], $_POST['reduction'], $_POST['name'], $_POST['type']]);

header('Location: /modifyProduct.php?success=1'); // $_GET['success']
