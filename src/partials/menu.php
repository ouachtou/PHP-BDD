<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    nav {
        background-color: #06B0E2;
        height: 80px;
        display: flex;
    }

    img {
        width: 100px;
    }

    ul {
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0;
    }

    li {
        list-style-type: none;
    }

    a {
        text-decoration: none;
        color: #002029;
        font-size: 18px;
        font-weight: bold;
        padding: 10px 20px;
    }
</style>

<nav>

    <img src='/public/logo.png' alt='Logo'>

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

</nav>
