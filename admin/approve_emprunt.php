<?php
include("../database/connexion.php");

if (isset($_GET["id"])) {
    $id_emprunt = $_GET["id"];

    // Récupérer la date d'emprunt
    $requete = $connexion->prepare("SELECT date_emprunt FROM emprunts WHERE id = :id");
    $requete->bindParam(':id', $id_emprunt);
    $requete->execute();
    $emprunt = $requete->fetch(PDO::FETCH_ASSOC);

    if ($emprunt) {
        // Calcul de la date de retour estimée (+15 jours)
        $date_retour_estimee = date('Y-m-d H:i:s', strtotime($emprunt['date_emprunt'] . ' +15 days'));

        // Mettre à jour la date de retour estimée et le statut en 'approuvé'
        $update = $connexion->prepare("UPDATE emprunts SET date_retour_estimee = :date_retour_estimee, status = 'approuvé' WHERE id = :id");
        $update->bindParam(':date_retour_estimee', $date_retour_estimee);
        $update->bindParam(':id', $id_emprunt);
        $update->execute();

        header("Location: emprunts.php?message=Emprunt approuvé avec succès");
        exit();
    } else {
        header("Location: emprunts.php?message=Emprunt introuvable");
        exit();
    }
} else {
    header("Location: emprunts.php?message=Identifiant manquant");
    exit();
}
?>
