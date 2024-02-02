<?php
// Inclusion du fichier d'initialisation pour configurer l'application
require_once __DIR__ . '/../src/init.php';

if (!$user){
    header('Location: index.php');
} elseif (!$user['admin']) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Add Product</title>
</head>

<body oncontextmenu="return false">
    <?php
    // Inclusion du menu depuis le fichier menu.php
    require_once __DIR__ . '/../src/partials/menu.php';

    // Inclusion de la gestion des erreurs depuis le fichier show_error.php
    require_once __DIR__ . '/../src/partials/show_error.php';
    ?>

    <!-- Formulaire d'ajout de produit -->
    <form action="/actions/addProduct.php" method="post">
        <!-- Champ "Name" -->
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>

        <!-- Champ "Type" -->
        <div>
            <label for="type">Type:</label>
            <input type="text" name="type" id="type">
        </div>

        <!-- Champ "Price" -->
        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price">
        </div>

        <!-- Champ "Quantity" -->
        <div>
            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" id="quantity">
        </div>

        <!-- Champ "Reduction" -->
        <div>
            <label for="reduction">Reduction:</label>
            <input type="text" name="reduction" id="reduction">
        </div>

        <!-- Champ "Image" -->
        <div>
            <label for="image">Image:</label>
            <input type="text" name="image" id="image">
        </div>

        <!-- Bouton de soumission -->
        <div>
            <button type="submit">Add</button>
        </div>
    </form>
</body>

</html>