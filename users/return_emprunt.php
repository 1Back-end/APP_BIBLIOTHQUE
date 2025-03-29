<?php
include("../database/connexion.php");

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id_emprunt = $_GET["id"];
    $date_retour_reel = date('Y-m-d H:i:s');

    try {
        // Mettre à jour le statut en 'retournée' et la date de retour réel
        $update = $connexion->prepare("UPDATE emprunts SET status = 'retournée', date_retour_reel = :date_retour_reel WHERE id = :id");
        $update->bindParam(':id', $id_emprunt, PDO::PARAM_INT);
        $update->bindParam(':date_retour_reel', $date_retour_reel);
        $update->execute();

        if ($update->rowCount() > 0) {
            header("Location: mes_emprunts.php?message=Livre retourné avec succès");
            exit();
        } else {
            header("Location: mes_emprunts.php?message=Aucune modification effectuée");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: mes_emprunts.php?message=Erreur lors du retour du livre");
        exit();
    }
} else {
    header("Location: mes_emprunts.php?message=Identifiant invalide ou manquant");
    exit();
}
?>
