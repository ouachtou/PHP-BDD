<?php
/**
 * Affiche un message d'erreur stocké dans la session (s'il existe) et le supprime ensuite de la session.
 */
if (isset($_SESSION['error_message'])) {
    ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error_message'] ?>
    </div>
    <?php
    unset($_SESSION['error_message']); // Supprime le message d'erreur de la session
}
?>
