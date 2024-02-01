<?php
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Add Product</title>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <form action="/actions/addProduct.php" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="type">Type:</label>
            <input type="text" name="type" id="type">
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price">
        </div>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" id="quantity">
        </div>
        <div>
            <label for="reduction">Reduction:</label>
            <input type="text" name="reduction" id="reduction">
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="text" name="image" id="image">
        </div>
        <div>
            <button type="submit">Add</button>
        </div>
    </form>
</body>

</html>