<?php

// require_once __DIR__ . '/db.php';

// function redirect() {
//     header('Location: ./public/index.php');
//     exit();
// }


function selectProduct() {

    $pdo = initDB();

    try {
        $select = $pdo->prepare('SELECT * FROM Products');
        $select -> execute();

        $allProducts = $select->fetchAll();

        return $allProducts;

    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    };
}

function displayProduct() {

    $allProducts = selectProduct();

    $list = '';

    foreach($allProducts as $rows){
        $id = $rows['id'];
        $name = $rows['name'];
        $type = $rows['type'];
        $price = $rows['price'];
        $quantity = $rows['quantity'];
        $reduction = $rows['reduction'];

        $list .= '<form action="product.php" method="post">' ;
        $list .= '  <input type="hidden" name="id" value="'. $id .'">' ;
        $list .= '  <button class="card-P" type="submit">' ;
        $list .= '      <div class="image-P"></div>' ;
        $list .= '      <div class="infos-P">' ;
        $list .= '          <p class="name-P">'. $name .'</p>' ;
        $list .= '          <p class="price-P">'. $price .' €</p>' ;
        $list .= '      </div>' ;
        $list .= '  </button>' ;
        $list .= '</form>' ;

    }

    return $list;
}



