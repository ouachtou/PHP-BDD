<?php
// Inclusion du fichier d'initialisation
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>TechShop - Login</title>
</head>

<body>
    <?php
    // Inclusion du menu
    require_once __DIR__ . '/../src/partials/menu.php';
    // Inclusion du gestionnaire d'erreurs
    require_once __DIR__ . '/../src/partials/show_error.php';
    ?>

    <div class="form_box">
        <form action="/actions/login.php" method="post">
            <!-- Champs du formulaire de connexion -->
            <div>
                <input placeholder="Email" type="email" name="email" id="email">
            </div>
            <div>
                <input placeholder="Password" type="password" name="password" id="password">
            </div>
            <div>
                <label for="rememberme">Remember Me</label>
                <input type="checkbox" name="rememberme" id="rememberme" value="yes">
            </div>
            <div>
                <button class="submit" type="submit">LOG ME IN!</button>
            </div>
        </form>
    </div>
</body>

</html>