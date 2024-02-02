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
    <title>TechShop - Register</title>
</head>

<body>
    <?php
    // Inclusion du menu
    require_once __DIR__ . '/../src/partials/menu.php';
    // Inclusion du gestionnaire d'erreurs
    require_once __DIR__ . '/../src/partials/show_error.php';
    ?>

    <div class="form_box">
        <!-- Formulaire de enregistrement -->
       <form action="/actions/register.php" method="post">
            <div>
                <input placeholder="First name" type="text" name="first_name" id="first_name">
            </div>
            <div>
                <input placeholder="E-mail" type="email" name="email" id="email">
            </div>
            <div>
                <input placeholder="Password" type="password" name="password" id="password">
            </div>
            <div>
                <input placeholder="Confirm Password" type="password" name="cpassword" id="cpassword">
            </div>
            <div>
                <button type="submit">Register NOW!</button>
            </div>
        </form>
    </div>
</body>

</html>
