<?php
require_once __DIR__ . '/../../src/init.php';

function SelectDedicatedProduct($pdo, $name, $type)
{
    $select = $pdo->prepare('SELECT * FROM Products WHERE name = ? AND type = ?');
    $select->execute([$name, $type]);

    return $select->fetch();;
}

function DisplayDedicatedProduct($pdo, $name, $type)
{
    $product = SelectDedicatedProduct($pdo, $name, $type);
    $id = $product['id'];
    $name = $product['name'];
    $type = $product['type'];
    $price = $product['price'];
    $quantity = $product['quantity'];
    $img = $product['image'];

    $list = '';
    $list .= '<img id="img-PD" src="' . $img . '" ></img>';
    $list .= '<div id="infos-PD">';
    $list .= '<p id="name-PD">' . $name . '</p>';
    $list .= '<p id="type-PD">' . $type . '</p>';

    $list .= '<hr>';

    $list .= '<p id="price-PD">' . $price . ' €</p>';
    $list .= '<p id="quantity-PD"><span>' . $quantity . '</span> en stock</p>';
    $list .= '<form action="/actions/addToCart.php" method="POST">';
    $list .= '  <input type="hidden" name="productId" value="' . $id . '">';
    $list .= '  <input type="submit" id="addCart-PD" value="Add to Cart">';
    $list .= '</form>';

    $list .= '<hr>';

    $list .= '<p>Liste des avis :</p>';
    $list .= '</div>';

    return $list;
}
