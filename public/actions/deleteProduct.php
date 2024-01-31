<?php
require_once __DIR__ . '/init.php';

function deleteProduct($pdo, $idProduct) {
    try {
        $delete = $pdo->prepare('DELETE FROM Products WHERE id = ?');
        $delete -> execute([$idProduct]);
        
    } catch (Exception $e) {
        echo 'Exception : ',  $e->getMessage(), "\n";
    };
}