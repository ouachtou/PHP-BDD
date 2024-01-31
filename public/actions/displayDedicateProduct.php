<?php 

function selectDediProduct($idProduct) {

    $pdo = initDB();

    try {
        $select = $pdo->prepare('SELECT * FROM Products WHERE id=?');
        $select -> execute([$idProduct]);

        $dediProduct = $select->fetch();

        return $dediProduct;

    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    };
}

function displayDediProduct($idProduct){
    $product = selectDediProduct($idProduct);
    $name = $product['name'];
    $type = $product['type'];
    $price = $product['price'];
    $quantity = $product['quantity'];

    $list = '';

    $list .= '<p id="name-PD">'. $name .'</p>' ;
    $list .= '<p id="type-PD">'. $type .'</p>' ;
    $list .= '<hr>' ;
    $list .= '<p id="price-PD">'. $price .' €</p>';
    $list .= '<p id="quantity-PD"><span>'. $quantity .'</span> en stock</p>';
    $list .= '<button id="addCart-PD"> Ajouter au panier </button>';
    $list .= '<hr>';
    $list .= '<p>Liste des avis :</p>';


    return $list;
}