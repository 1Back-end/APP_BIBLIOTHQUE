<?php
include("../database/connexion.php");

if (isset($_GET["id"])) {
    $id_categorie = $_GET["id"];
    
    // Préparer la requête pour supprimer la catégorie en utilisant son ID
    $requete = $connexion->prepare("DELETE FROM categories WHERE id = :id");
    $requete->bindParam(':id',$id_categorie);
    $requete->execute();

    if ($requete->rowCount() > 0) {
        header("Location: categories.php?message=Catégorie supprimée avec succès");
        exit(); // Toujours ajouter exit après un header pour arrêter l'exécution du script
    } else {
        header("Location: categories.php?message=Erreur lors de la suppression");
        exit();
    }
} else {
    // Si l'identifiant du chauffeur est manquant dans l'URL
    header("Location: categories.php?message=Identifiant de la catégorie manquante");
    exit();
}
?>
