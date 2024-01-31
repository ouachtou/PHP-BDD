<?php
require_once __DIR__ . '/../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product_name = $_POST['product_name']; 
    $comment = $_POST['comment'];
    $note = $_POST['note'];

    $userId = $_SESSION['user_id'];

    $pdoStatement = $pdo->prepare("SELECT id FROM Products WHERE name = ?");
    $pdoStatement->execute([$product_name]);
    $productId = $pdoStatement->fetchColumn();

    $pdoStatement = $pdo->prepare("SELECT L.id
                                    FROM Links AS L
                                    JOIN Orders AS O ON O.id = L.id_order
                                    WHERE L.id_product = ? AND O.id_user = ?");
    $pdoStatement->execute([$productId, $userId]);
    $link = $pdoStatement->fetch();

    if ($link) {
        $pdoStatement = $pdo->prepare("INSERT INTO Feedbacks (id_user, id_product, comment, note) VALUES (?, ?, ?, ?)");
        $pdoStatement->execute([$userId, $productId, $comment, $note]);

        echo "Feedback ajouté avec succès!";
    } else {
        echo "Vous ne pouvez pas laisser de feedback pour un produit non commandé.";
    }
}
?>
<h2>Ajouter un Feedback</h2>

<form method="post" action="nom_de_votre_page.php">

    <input placeholder="nom du produit" type="text" name="product_name" required>

    <textarea placeholder="Commentaire" name="comment" rows="4" required></textarea>

    <input placeholder="Note" type="number" name="note" min="1" max="5" required>

    <button type="submit">Ajouter le Feedback</button>
</form>
