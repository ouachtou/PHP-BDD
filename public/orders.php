<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../public/actions/filterOrder.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Orders</title>
    <style>
        td,
        th {
            width: 25%;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <table>
        <section class="filtre">
            <form action='/orders.php' method="POST">
                <legend>Status :</legend>

                <div>
                    <input type="checkbox" id="new" name="new" />
                    <label for="new">New</label>
                </div>

                <div>
                    <input type="checkbox" id="sent" name="sent" />
                    <label for="sent">Sent</label>
                </div>

                <div>
                    <input type="checkbox" id="finished" name="finished" />
                    <label for="finished">Finished</label>
                </div>
                <div>
                    <input type="checkbox" id="returned" name="returned" />
                    <label for="returned">Returned</label>
                </div>

                <legend>Date :</legend>
                <div>
                    <input type="radio" id="created_at" name="order" value="created_at" />
                    <label for="created_at">Created at</label>
                </div>
                <div>
                    <input type="radio" id="updated_at" name="order" value="updated_at" />
                    <label for="updated_at">Updated at</label>
                </div>
                <input type="submit" value="Submit">
            </form>
        </section>

        <tr>
            <th>Order's ID</th>
            <th>Order's Date</th>
            <th>Status</th>
            <th>Products</th>
        </tr>

        <?php
        $orders = GetOrders($pdo);

        foreach ($orders as $order) :
            if (
                !((empty($_POST['new']) && $order['status'] == "New")
                    || (empty($_POST['sent']) && $order['status'] == "Sent")
                    || (empty($_POST['finished']) && $order['status'] == "Finished")
                    || (empty($_POST['returned']) && $order['status'] == "Returned"))
                || (empty($_POST['new']) && empty($_POST['sent']) && empty($_POST['finished']) && empty($_POST['returned']))
            ) :

                $pdoStatement = $pdo->prepare("SELECT P.name, P.type, P.price, P.reduction
                FROM Links AS L
                JOIN Products AS P ON P.id = L.id_product
                WHERE L.id_order = ?");
                $pdoStatement->execute([$order['id']]);
                $products = $pdoStatement->fetchAll();
        ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['created_at'] ?></td>
                    <td><?= $order['status'] ?></td>
                    <td>
                        <ul>
                            <?php
                            foreach ($products as $product) :
                            ?>
                                <li>
                                    <?= $product['name'] ?> - <?= $product['type'] ?> - <?= $product['price'] ?> - <?= $product['reduction'] ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                    <?php if ($user['admin'] === 1) : ?>
                        <td>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                <select name="new_status">
                                    <option value="New">New</option>
                                    <option value="Sent">Sent</option>
                                    <option value="Finished">Finished</option>
                                    <option value="Returned">Returned</option>
                                </select>
                                <button type="submit">Change status</button>
                            </form>
                        </td>
                    <?php endif; ?>
                    <?php if ($user['admin'] === 1 && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'], $_POST['new_status'])) {
                        $order_id = $_POST['order_id'];
                        $new_status = $_POST['new_status'];
                        $pdoStatement = $pdo->prepare("UPDATE Orders SET status = ?, updated_at = current_timestamp() WHERE id = ?");
                        $pdoStatement->execute([$new_status, $order_id]);
                        echo '<script>window.location="orders.php"</script>';
                    }
                    ?>
                </tr>
            <?php endif; ?>

        <?php endforeach; ?>
    </table>
</body>

</html>