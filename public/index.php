<?php
require_once __DIR__ . '/../src/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonjour</title>
    <?php require_once __DIR__ . '/../src/partials/head_css.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Bonjour</h1>
                <div class="alert alert-success">
                    Bienvenue sur la boutique !
                </div>
            </div>
        </div>
    </div>

    <!-- #Formulaire --->
    <div class="search_container">
        <form action="index.php" method="POST">
            <input name="search" type="text" placeholder="Rechercher ...">
            <input type="submit" value="Search">
        </form>
    </div>

    <!-- #TABLEAU --->
    <table class="search">
        <tbody>
            <tr class="product">
                <td>id</td>
                <td>name</td>
                <td>type</td>
                <td>price</td>
                <td>quantity</td>
                <td>reduction</td>
            </tr>
            <?php
            $searchValue = isset($_POST['search']) ? $_POST['search'] : "";
            $pdoStatement = $pdo->prepare("SELECT * FROM Products 
            WHERE (name LIKE '%$searchValue%') OR (type LIKE '%$searchValue%') OR (price LIKE '%$searchValue%')");
            $pdoStatement->execute();
            $products = $pdoStatement->fetchAll();
            ?>
            <?php foreach ($products as $product) : ?>
                <tr class="case">
                    <td><?php echo $product['id'] ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['type'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['quantity'] ?></td>
                    <td><?php echo $product['reduction'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>