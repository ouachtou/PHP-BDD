<?php
// Inclusion du fichier d'initialisation
require_once __DIR__ . '/../src/init.php';

if (!$user){
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Shopping Cart</title>

    <style>
        td {
            width: 20%;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    // Inclusion du menu
    require_once __DIR__ . '/../src/partials/menu.php';
    // Inclusion du gestionnaire d'erreurs
    require_once __DIR__ . '/../src/partials/show_error.php';
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Real Price</th>
            <th>Reduction</th>
            <th>To Pay</th>
        </tr>

        <?php
        // Récupération des produits dans le panier de l'utilisateur
        $pdoStatement = $pdo->prepare("SELECT p.name, p.type, p.price, p.reduction FROM Products AS p
        JOIN Links AS l ON l.id_product = p.id
        JOIN Orders AS o ON l.id_order = o.id
        JOIN Users AS u ON u.id = o.id_user
        WHERE u.id = ? AND status = 'New'");
        $pdoStatement->execute([$user['id']]);
        $products = $pdoStatement->fetchAll();

        foreach ($products as $product) : ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['type'] ?></td>
                <td><?= $product['price'] ?>€</td>
                <td><?= $product['reduction'] ?>%</td>
                <td><?= round($product['price'] * (1 - $product['reduction'] / 100), 2) ?>€</td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <br>
    <br>

    <div>
        <!-- Formulaire de commande -->
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
                <input placeholder="Address" type="text" name="address" id="address">
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

</html>