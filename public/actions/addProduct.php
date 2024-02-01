<?php
require_once __DIR__ . '/../../src/init.php';
// $pdo est dispo !

if (empty($_POST['name'])) {
    // error
    $_SESSION['error_message'] = 'Name field is empty.';
    header('Location: /addProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['type'])) {
    // error
    $_SESSION['error_message'] = 'Type field is empty.';
    header('Location: /addProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['price'])) {
    // error
    $_SESSION['error_message'] = 'Price field is empty.';
    header('Location: /addProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['quantity'])) {
    // error
    $_SESSION['error_message'] = 'Quantity field is empty.';
    header('Location: /addProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (!empty($_POST['reduction'])) {
    if (!is_numeric($_POST['reduction'])) {
        // error
        $_SESSION['error_message'] = 'Reduction must be a number.';
        header('Location: /addProduct.php'); // redirige utilisateur
        die(); // stop execution du script
    }
}
 
if (!is_numeric($_POST['price'])) {
    // error
    $_SESSION['error_message'] = 'Price must be a number.';
    header('Location: /addProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (!is_numeric($_POST['quantity'])) {
    // error
    $_SESSION['error_message'] = 'Quantity must be a number.';
    header('Location: /addProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}


// verifier qu'aucun n'objet n'a le meme nom et le meme type dans la DB
$st1 = $pdo->prepare('SELECT * FROM products WHERE name = ? AND type = ?');
$st1->execute([$_POST['name'], $_POST['type']]);
$alreadyExists = $st1->fetch(PDO::FETCH_ASSOC);
if ($alreadyExists != false) {
    $_SESSION['error_message'] = 'A product of the same type has the same name.';
    header('Location: /addProduct.php'); // redirige utilisateur
    die(); // stop execution du script
}

// INSERT
$st2 = $pdo->prepare('INSERT INTO products(name, type, price, quantity, image) VALUES(?, ?, ?, ?, ?)');
$st2->execute([$_POST['name'], $_POST['type'], $_POST['price'], $_POST['quantity'], $_POST['image']]);

header('Location: /addProduct.php?success=1'); // $_GET['success']
