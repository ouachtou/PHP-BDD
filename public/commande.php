<?php
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <table>
        <tr>
            <td>name</td>
            <td>type</td>
            <td>price</td>
            <td>reduction</td>
            <td>reduced price</td>
        </tr>

        <?php
        $pdoStatement = $pdo->prepare("SELECT id FROM Orders AS o
        JOIN Users AS u ON u.id = o.id_user;
        WHERE u.id = ?");
        $pdoStatement->execute([$_SESSION['user_id']]);
        $orders = $pdoStatement->fetchAll();

        foreach ($orders as $order) : 
            $pdoStatement = $pdo->prepare("SELECT id_product FROM Links AS L
            JOIN Product AS P ON P.id = l.id_product;
            WHERE l.id = $order");
            $pdoStatement->execute([$_SESSION['user_id']]);
            $products = $pdoStatement->fetchAll();
            ?>
            <tr>
                <td><?= $order['id'] ?></td>
            </tr>
            <?
            foreach ($products as $product) :
                $pdoStatement = $pdo->prepare("SELECT * FROM Product AS P
                JOIN Link AS L ON L.id_product = P.id;
                WHERE l.id_product = $product");
                $pdoStatement->execute([$_SESSION['user_id']]);
                $finals = $pdoStatement->fetchAll();
                foreach ($finals as $final) :
            ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['type'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['reduction'] ?></td>
                <td><?= round($product['price'] * (1 - $product['reduction'] / 100), 2) ?></td>
            </tr>
        <?php endforeach; 
        endforeach;
    endforeach;?>
    </table>
</body>
