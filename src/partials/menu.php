<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    #navbar {
        background-color: #06B0E2;
        background: linear-gradient(#002029 10%, #06B0E2 100%);
        height: 80px;
        display: flex;
        padding: 0 4vw;
        /* border-bottom: 4px solid #FF914D; */
        box-shadow: 0 0 5px 5px grey;
    }

    #img-logo {
        width: 80px;
        height: 90%;
        align-self: end;
        margin-right: 20px;
        margin: 0 40px;
    }

    nav {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #leftNav, #rightNav {
        display: flex;
    }

    li {
        list-style-type: none;
    }

    a {
        text-decoration: none;
        color: white;
        font-size: 18px;
        font-weight: bold;
        padding: 10px 20px;
    }
    a:hover {
        color: #FF914D;
    }

</style>

<div id="navbar">

    <!-- <h1 id="logo">TechShop</h1> -->

    <nav>
        <div id="leftNav">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/productsList.php">Products List</a>
            </li>
            <li>
                <a href="/shoppingCart.php">Shopping Cart</a>
            </li>
            <li>
                <a href="/feedback.php">Rate product</a>
            </li>
        </div>

        <img id='img-logo' src='assets/logo.png' alt='Logo'>

        <div id="rightNav">
            <?php
            if ($user === false) { ?>
                <li>
                    <a href="/register.php">Register</a>
                </li>
                <li>
                    <a href="/login.php">Login</a>
                </li>
            <?php } else { ?>
                <?php if ($user['admin']) { ?>
                    <li>
                        <a href="/addProduct.php">Add Product</a>
                    </li>
                    <li>
                        <a href="/modifyProduct.php">Modify Product</a>
                    </li>
                    <li>
                        <a href="/commande.php">Orders</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="/actions/logout.php">Log OUT</a>
                </li>
            <?php } ?>
        </div>
    </nav>

</div>
