<?php
require_once __DIR__ . '/../../src/init.php';


if ($user['admin'] === 1 && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $delete = $pdo->prepare('DELETE FROM Products WHERE id = ?');
    $delete->execute([$_POST['id']]);
    header('Location: /productsList.php');
}