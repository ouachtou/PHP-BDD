<?php
require_once __DIR__ . '/../../src/init.php';

function SelectName($pdo, $id_user){
    try {
        $select = $pdo->prepare('SELECT first_name FROM Users WHERE id = ?');
        $select->execute([$id_user]);

        return $select->fetch();
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    };
}

function SelectFeedbacks($pdo, $idProduct) {
    try {
        $select = $pdo->prepare('SELECT comment, note, id_user FROM Feedbacks WHERE id_product = ?');
        $select->execute([$idProduct]);


        return $select->fetchAll();
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    };
}

function SelectDedicatedProduct($pdo, $name, $type)
{
    $select = $pdo->prepare('SELECT * FROM Products WHERE name = ? AND type = ?');
    $select->execute([$name, $type]);

    return $select->fetch();
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

    $list .= '<h4>Les avis :</h4>';
    
    $feed = SelectFeedbacks($pdo, $id);



    foreach ($feed as $rows) {
        $comment = $rows['comment'];
        $note = $rows['note'];
        $idUser = $rows['id_user'];

        $selectname = (SelectName($pdo, $rows['id_user'] ));
        
        $nameUser = $selectname['first_name'];

        $list .= '<div style="background-color: white;border-radius: 5px; margin: 5px 0; border: 1px solid grey; padding: 5px">';
        $list .= '<h5 style="font-weight:bold;">'. $nameUser . "</h5>";
        $list .= '<p> <span style="font-size:20px ;font-weight:bold;">'. $note .'/5 : </span> '. $comment .'</p>';
        $list .= '</div>';

    }

    return $list;
}
