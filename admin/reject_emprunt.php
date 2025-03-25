<?php
include("../database/connexion.php");

if (isset($_GET["id"])) {
    $id_emprunt = $_GET["id"];

    // Mettre à jour le statut en 'rejetté'
    $update = $connexion->prepare("UPDATE emprunts SET status = 'rejetté' WHERE id = :id");
    $update->bindParam(':id', $id_emprunt);
    $update->execute();

    if ($update->rowCount() > 0) {
        header("Location: emprunts.php?message=Emprunt rejeté avec succès");
        exit();
    } else {
        header("Location: emprunts.php?message=Erreur lors du rejet de l'emprunt");
        exit();
    }
} else {
    header("Location: emprunts.php?message=Identifiant manquant");
    exit();
}
?>
