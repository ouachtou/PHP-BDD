<?php
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Shopping Cart</title>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <table>
        <tr>
            <th>name</td>
            <th>type</td>
            <th>price</td>
            <th>reduction</td>
            <th>reduced price</td>
        </tr>

        <?php
        $pdoStatement = $pdo->prepare("SELECT * FROM Products AS p
        JOIN Links AS l ON l.id_product = p.id
        JOIN Orders AS o ON l.id_order = o.id
        JOIN Users AS u ON u.id = o.id_user;
        WHERE u.id = ?");
        $pdoStatement->execute([$_SESSION['user_id']]);
        $products = $pdoStatement->fetchAll();

        foreach ($products as $product) : ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['type'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['reduction'] ?></td>
                <td><?= round($product['price'] * (1 - $product['reduction'] / 100), 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <br>
    <br>

    <div>
        <form action="/actions/shoppingCart.php" method="post">
            <div>
                <input placeholder="Name" type="text" name="name" id="name">
            </div>
            <div>
                <input placeholder="First name" type="text" name="first_name" id="first_name">
            </div>
            <div>
                <input placeholder="E-mail" type="email" name="email" id="email">
            </div>
            <div>
                <input placeholder="Adress" type="text" name="adress" id="adress">
            </div>
            <div>
                <input placeholder="Number" type="tel" name="number" id="number">
            </div>
            <div>
                <button type="submit">Order</button>
            </div>
        </form>
    </div>
</body>