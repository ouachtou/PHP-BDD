
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
                <h1>Dégage t'a pas les droits</h1>
                <video style="margin: auto;"  controls autoplay muted>
                    <source src="assets/degage.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</body>