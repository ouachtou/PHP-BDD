<?php

function SelectDedicatedProduct($pdo, $name, $type)
{
    try {
        $select = $pdo->prepare('SELECT * FROM Products WHERE name = ? AND type = ?');
        $select->execute([$name, $type]);

        return $select->fetch();;
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    };
}

function DisplayDedicatedProduct($pdo, $name, $type)
{
    $product = SelectDedicatedProduct($pdo, $name, $type);
    $name = $product['name'];
    $type = $product['type'];
    $price = $product['price'];
    $quantity = $product['quantity'];
    $img = $product['img'];

    $list = '';
    $list .= '<img id="img-PD" src="' . $img . '" ></img>';
    $list .= '<p id="name-PD">' . $name . '</p>';
    $list .= '<p id="type-PD">' . $type . '</p>';
    $list .= '<hr>';
    $list .= '<p id="price-PD">' . $price . ' €</p>';
    $list .= '<p id="quantity-PD"><span>' . $quantity . '</span> en stock</p>';
    $list .= '<button id="addCart-PD"> Ajouter au panier </button>';
    $list .= '<hr>';
    $list .= '<p>Liste des avis :</p>';

    return $list;
}