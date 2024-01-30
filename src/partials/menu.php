<?php
require_once __DIR__ . '/../init.php';
?>

<ul>
    <li>
        <a href="/">Home</a>
    </li>
    <?php
    if ($user === false) { ?>
        <li>
            <a href="/register.php">Register</a>
        </li>
        <li>
            <a href="/login.php">Login</a>
        </li>
    <?php } else { ?>
        <?php if ($user->admin) { ?>
            <li>
                <a href="/addProduct.php">Add Product</a>
            </li>
        <?php } ?>
        <li>
            <a href="/actions/logout.php">Log OUT</a>
        </li>
    <?php } ?>
</ul>