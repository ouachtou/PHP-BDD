<?php
require_once __DIR__ . '/../../src/init.php';

function GetProducts($pdo)
{
    $searchValue = isset($_POST['search']) ? $_POST['search'] : "";

    try {
        $st1 = $pdo->prepare("SELECT name, type, price, quantity, reduction, AVG(note) AS rating FROM Products AS p
        LEFT JOIN Feedbacks AS f ON f.id_product = p.id
        WHERE (p.name LIKE '%$searchValue%') OR (p.type LIKE '%$searchValue%') OR (p.price LIKE '%$searchValue%')
        GROUP BY p.id;");
        $st1->execute();
        $products = $st1->fetchAll();

        return $products;
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    };
}

function DisplayProducts($pdo)
{
    $allProducts = GetProducts($pdo);
    $list = '';

    foreach ($allProducts as $rows) {
        $name = $rows['name'];
        $type = $rows['type'];
        $price = $rows['price'];
        $quantity = $rows['quantity'];
        $reduction = $rows['reduction'];
        $rating = $rows['rating'];

        $list .= '<button class="card-P">';
        $list .= '  <div class="image-P"></div>';
        $list .= '  <div class="infos-P"> ';
        $list .= '      <p class="name-P">' . $name . '</p>';
        $list .= '      <div class="price-P"> ';
        if ($reduction > 0) {
            $list .= '          <p style="text-decoration: line-through;">' . $price . ' €</p>';
            $list .= '          <p style="margin-left: 5px;">' . round($price * (1 - $reduction / 100), 2) . ' €</p>';
        } else {
            $list .= '          <p>' . $price . ' €</p>';
        }
        $list .= '      </div>';
        $list .= '      <div class="rating-P"> ';
        $list .= '          <img src="../assets/stars.png" class="stars-P" style="width:' . 107.083 * $rating / 10 . 'px;">';
        $list .= '          <p style="margin-left: 5px; margin-top: 3px; margin-bottom: 0;">' . $rating / 2 . '</p>';
        $list .= '      </div>';
        if ($quantity > 0) {
            $list .= ' <p class="quantity-p">' . $quantity . ' restante(s) </p>';
        } else {
            $list .= '          <p class="quantity-p"> Hors Stock </p>';
        }
        $list .= '  </div>';
        $list .= ' </button>';
    }
    return $list;
}
