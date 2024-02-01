<?php
function GetOrders($pdo)
{
    if (!empty($_POST['order'])) {
        $request = "SELECT * FROM Orders ORDER BY " . $_POST['order'] . " ASC";
        $pdoStatement = $pdo->prepare($request);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll();
    } else {
        $pdoStatement = $pdo->prepare("SELECT * FROM Orders");
        $pdoStatement->execute();
        return $pdoStatement->fetchAll();
    }
};
