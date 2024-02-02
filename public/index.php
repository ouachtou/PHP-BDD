<?php
// Inclusion du fichier d'initialisation
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Home</title>
    <?php
    // Inclusion du fichier de styles CSS pour l'en-tête
    require_once __DIR__ . '/../src/partials/head_css.php';
    ?>
</head>

<body>
    <?php
    // Inclusion du menu
    require_once __DIR__ . '/../src/partials/menu.php';
    // Inclusion du gestionnaire d'erreurs
    require_once __DIR__ . '/../src/partials/show_error.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Hello</h1>
                <div class="alert alert-success">
                    Welcome to TechShop!
                </div>
                <div style="display: flex; flex-wrap: wrap; align-items:center; justify-content : space-around; margin-bottom: 20px;">
                    <div style="padding: 0 20px;">
                        <h1 >Notre Boutique</h1>
                        <p>Avenue de la Tech,</p>
                        <p>78500 SARTROUVILLE</p>
                    </div>
                    <img style="width: 50%;" src="https://media.materiel.net/cms/shop/matnet-strasbourg-1.jpg" alt="">
                </div>
                <div style="display: flex; flex-wrap: wrap; align-items:center; justify-content : space-around; margin-bottom: 20px;">
                    <img style="width: 50%;" src="https://www.axido.fr/wp-content/uploads/2021/07/shutterstock_1057841874.webp" alt="">
                    <div style="padding: 0 20px;">
                        <h1>Notre DataCenter</h1>
                        <p>On a vla les données dedans on connait tous sur tous</p>
                    </div>
                </div>
                <div style="display: flex; flex-wrap: wrap; align-items:center; justify-content : space-around; margin-bottom: 20px;">
                    <div style="padding: 0 20px;">
                        <h2 style="padding: 0 20px;">Nous somme prêt à vous accueillir</h2>
                        <p>comme il se doit</p>
                    </div>
                    <img width="50%" src="https://i.imgflip.com/1z2ofw.jpg" alt="">
                </div>
               
            </div>
        </div>
    </div>

</body>

</html>