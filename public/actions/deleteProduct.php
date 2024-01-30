<?php

require_once __DIR__ . '/db.php';

function deleteProduct($idProduct) {

    $pdo = initDB();

    try {
        $delete = $pdo->prepare('DELETE FROM Products WHERE id = ?');
        $delete -> execute([$idProduct]);
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    };


}