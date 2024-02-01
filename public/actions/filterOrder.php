<?php
function GetOrders($pdo)
{
    try {
        $pdoStatement = $pdo->prepare("SELECT * FROM Orders ");
        $pdoStatement->execute();
        $orders = $pdoStatement->fetchAll();
        return $orders;
    } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
};

function FiltersOrders($pdo)
{
    $allOrders = GetOrders($pdo);

    if ($_POST['new']) {
    }
}