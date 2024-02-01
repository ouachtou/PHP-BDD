<?php
require_once __DIR__ . '/../../src/init.php';

function DeleteProduct($pdo, $idProduct)
{
    $delete = $pdo->prepare('DELETE FROM Products WHERE id = ?');
    $delete->execute([$idProduct]);
}
