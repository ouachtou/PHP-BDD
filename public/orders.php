<?php
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Orders</title>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <table>
        <tr>
            <th>Order's ID</th>
            <th>Order's Date</th>
            <th>Status</th>
            <th>Products</th>
        </tr>

        <?php
        $pdoStatement = $pdo->prepare("SELECT id, created_at, status FROM Orders WHERE id_user = ?");
        $pdoStatement->execute([$_SESSION['user_id']]);
        $orders = $pdoStatement->fetchAll();

        foreach ($orders as $order) :
            $pdoStatement = $pdo->prepare("SELECT P.name, P.type, P.price, P.reduction
            FROM Links AS L
            JOIN Products AS P ON P.id = L.id_product
            WHERE L.id_order = ?");
            $pdoStatement->execute([$order['id']]);
            $products = $pdoStatement->fetchAll();
        ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= $order['created_at'] ?></td>
                <td><?= $order['status'] ?></td>
                <td>
                    <ul>
                        <?php
                        foreach ($products as $product) :
                        ?>
                            <li>
                                <?= $product['name'] ?> - <?= $product['type'] ?> - <?= $product['price'] ?> - <?= $product['reduction'] ?>%
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>