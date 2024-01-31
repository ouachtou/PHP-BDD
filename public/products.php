<?php
    require_once __DIR__ . '/../src/init.php';
    require_once __DIR__ . '/../public/actions/displayProducts.php';

    function redirect() {
        header('Location: register.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap-5.3.2-dist/css/products.css">
    <title>TechShop - Our Products</title>
    <?php require_once __DIR__ . '/../src/partials/head_css.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cardsContainer">

                    <?= displayProduct() ?>
                    <!-- <button class="card-P onclick=">
                        <div class="image-P"></div>
                        <div class="infos-P"> 
                            <p class="name-P">clavier</p>
                            <p class="price-P">20 €</p>
                        </div>;
                    </button>

                    <form action="product.php" method="post">
                        <input type="hidden" name="id" value=" <?=2 ?>">
                        <button class="card-P" type="submit">
                            <div class="image-P"></div>
                            <div class="infos-P"> 
                                <p class="name-P">clavier</p>
                                <p class="price-P">20 €</p>
                            </div>
                        </button>
                    </form> -->


                </div>

            </div>
        </div>

    </div>
</body>

</html>