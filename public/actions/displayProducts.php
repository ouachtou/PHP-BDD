<?php
require_once __DIR__ . '/../../src/init.php';

/**
 * Récupère la liste des produits en fonction de la recherche effectuée.
 *
 * @param PDO $pdo - L'objet PDO pour la connexion à la base de données.
 * @return array - Un tableau associatif contenant les informations des produits.
 */
function GetProducts($pdo)
{
    $name = isset($_GET['product']) ? $_GET['product'] : "";
    $type = isset($_GET['category']) ? $_GET['category'] : "";

    $st1 = $pdo->prepare("SELECT *, AVG(note) AS rating FROM Products AS p
    LEFT JOIN Feedbacks AS f ON f.id_product = p.id
    WHERE (p.name LIKE'%$name%') AND (p.type LIKE'%$type%')
    GROUP BY p.id;");
    $st1->execute();
    $products = $st1->fetchAll();

    return $products;
}

/**
 * Affiche la liste des produits avec leurs informations.
 *
 * @param PDO $pdo - L'objet PDO pour la connexion à la base de données.
 * @return string - Une chaîne HTML contenant les informations des produits.
 */
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
        $img = $rows['image'];

        $list .= '<form action="product.php" method="GET">';
        $list .= '  <input type="hidden" name="product" value="' . $name . '">';
        $list .= '  <input type="hidden" name="category" value="' . $type . '">';
        $list .= '  <button class="card-P" type="submit">';
        $list .= '      <div class="image-P">';
        if ($img) {
            $list .= '      <img class="img-P" src="' . $img . '" alt="' . $name . '" ></img>';
        }
        $list .= '      </div>';
        $list .= '      <div class="infos-P">';
        $list .= '          <p class="name-P">' . $name . '</p>';
        $list .= '          <div class="price-P">';
        if ($reduction > 0) {
            $list .= '              <p style="text-decoration: line-through;">' . $price . ' €</p>';
            $list .= '              <p style="margin-left: 5px;">' . round($price * (1 - $reduction / 100), 2) . ' €</p>';
        } else {
            $list .= '              <p>' . $price . ' €</p>';
        }
        $list .= '          </div>';
        $list .= '          <div class="rating-P"> ';
        $list .= '              <img src="../assets/stars.png" class="stars-P" style="width:' . 107.083 * $rating / 10 . 'px;">';
        $list .= '              <p style="margin-left: 5px; margin-top: 3px; margin-bottom: 0;">' . $rating / 2 . '</p>';
        $list .= '          </div>';
        if ($quantity > 0) {
            $list .= '          <p class="quantity-p">' . $quantity . ' restante(s) </p>';
        } else {
            $list .= '          <p class="quantity-p"> Hors Stock </p>';
        }
        $list .= '      </div>';
        $list .= '  </button>';
        $list .= '</form>';
    }
    return $list;
}
