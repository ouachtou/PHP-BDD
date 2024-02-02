<?php
require_once __DIR__ . '/../../src/init.php';


    $delete = $pdo->prepare('DELETE FROM Products WHERE id = ?');
    $delete->execute([$_SESSION['idP']]);
    header('Location: /../ProductsList.php');

