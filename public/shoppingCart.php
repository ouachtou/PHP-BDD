<?php
require_once __DIR__ . '/../src/init.php';
?>

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
        $pdoStatement = $pdo->prepare("SELECT * FROM Products AS p
    JOIN Link AS l ON l.id_product = p.id
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
</body>