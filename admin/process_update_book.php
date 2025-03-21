<?php
include("../database/connexion.php");

$erreur = "";  // Variable pour les messages d'erreur
$success = ""; // Variable pour les messages de succès
if (isset($_POST['submit'])) {
    $id_book = $_GET['id'];
    // Récupérer les valeurs du formulaire
    $title = htmlspecialchars($_POST['title']);
    $category = htmlspecialchars($_POST['category']);
    $genre = htmlspecialchars($_POST['genre']);
    $price = htmlspecialchars($_POST['price']);
    $author = htmlspecialchars($_POST['author']);
    $year = htmlspecialchars($_POST['year']);
    $isbn = htmlspecialchars($_POST['isbn']);
    $description = htmlspecialchars($_POST['description']);
    
    // Récupérer l'image téléchargée (ou l'ancienne image si aucun fichier n'est sélectionné)
    $image = $_FILES['image']['name'];
    
    // Si une nouvelle image est téléchargée
    if (!empty($image)) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérification de l'image et téléchargement
        if (getimagesize($_FILES["image"]["tmp_name"]) !== false && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = basename($image);
        } else {
            $image = 'default.jpg'; // Image par défaut en cas d'échec
        }
    } else {
        // Si aucune nouvelle image n'est téléchargée, garder l'ancienne image
        $image = $_POST['existing_image'];
    }

    // Préparer la requête SQL pour mettre à jour les informations du livre
    $query = $connexion->prepare("UPDATE book SET 
                                    titre = :title, 
                                    categorie_id = :category, 
                                    genre = :genre, 
                                    prix = :price, 
                                    auteur_id = :author, 
                                    annee_publication = :year, 
                                    isbn = :isbn, 
                                    description = :description, 
                                    photo = :image 
                                  WHERE id = :id");

    // Lier les paramètres
    $query->bindParam(':title', $title);
    $query->bindParam(':category', $category);
    $query->bindParam(':genre', $genre);
    $query->bindParam(':price', $price);
    $query->bindParam(':author', $author);
    $query->bindParam(':year', $year);
    $query->bindParam(':isbn', $isbn);
    $query->bindParam(':description', $description);
    $query->bindParam(':image', $image);
    $query->bindParam(':id', $id_book);

    // Exécuter la requête
    if ($query->execute()) {
        $success = "Modification effectuée avec succès.";
    } else {
        $erreur = "Erreur lors de la modification du livre.";
    }
}

?>
