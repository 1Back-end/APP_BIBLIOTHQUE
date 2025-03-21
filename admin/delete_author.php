<?php
include("../database/connexion.php");

if (isset($_GET["id"])) {
    $id_author = $_GET["id"];
    
    // Préparer la requête pour supprimer la catégorie en utilisant son ID
    $requete = $connexion->prepare("DELETE FROM authors WHERE id = :id");
    $requete->bindParam(':id',$id_author);
    $requete->execute();

    if ($requete->rowCount() > 0) {
        header("Location: auteurs.php?message=Auteur supprimée avec succès");
        exit(); // Toujours ajouter exit après un header pour arrêter l'exécution du script
    } else {
        header("Location: auteurs.php?message=Erreur lors de la suppression");
        exit();
    }
} else {
    // Si l'identifiant du chauffeur est manquant dans l'URL
    header("Location: auteurs.php?message=Identifiant de l'auteur manquant");
    exit();
}
?>
