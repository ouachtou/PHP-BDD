<?php
require_once __DIR__ . '/../../src/init.php';

function GetProducts($pdo) {
    try {
        $select = $pdo->prepare('SELECT * FROM Products');
        $select -> execute();

        return $select->fetchAll();
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    };
}

function DisplayProducts($pdo) {
    $allProducts = GetProducts($pdo);
    $list = '';

    foreach($allProducts as $rows){
        $name = $rows['name'];
        $type = $rows['type'];
        $price = $rows['price'];
        $quantity = $rows['quantity'];
        $reduction = $rows['reduction'];

        $list .= '<button class="card-P">'  ;
        $list .= '  <div class="image-P"></div>';
        $list .= '  <div class="infos-P"> ';
        $list .= '      <p class="name-P">' . $name . '</p>';
        $list .= '      <p class="price-P">' . $price . ' €</p>';
        if($quantity > 0){
            $list .= '          <p class="quantity-P">' . $quantity . ' restante(s) </p>';
        }else{
            $list .= '          <p class="quantity-P"> Hors Stock </p>';
        $list .= '  </div>';
        $list .= ' </button>';
    }
}
    return $list;
}



