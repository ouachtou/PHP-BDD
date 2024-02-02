<?php

/**
 * Fonction pour récupérer la liste des commandes.
 *
 * @param PDO $pdo L'objet PDO pour la connexion à la base de données.
 * @return array Un tableau contenant les informations des commandes.
 */
function GetOrders($pdo)
{
    // Vérifie si le paramètre 'order' est défini dans la requête POST
    if (!empty($_POST['order'])) {
        // Construction de la requête avec tri selon la colonne spécifiée
        $request = "SELECT * FROM Orders ORDER BY " . $_POST['order'] . " ASC";
        $pdoStatement = $pdo->prepare($request);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll();
    } else {
        // Requête sans tri spécifié, récupère toutes les commandes
        $pdoStatement = $pdo->prepare("SELECT * FROM Orders");
        $pdoStatement->execute();
        return $pdoStatement->fetchAll();
    }
}
