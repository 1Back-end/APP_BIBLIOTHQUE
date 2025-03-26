<?php
include("../database/connexion.php");

$erreur = "";
$success = "";

// Traitement du formulaire
if (isset($_POST['submit'])) {
    // Récupérer les valeurs du formulaire
    $title = $_POST['title'] ?? null;
    $category = $_POST['category'] ?? null;
    $genre = $_POST['genre'] ?? null;
    $price = $_POST['price'] ?? null;
    $author = $_POST['author'] ?? null;
    $year = $_POST['year'] ?? null;
    $isbn = $_POST['isbn'] ?? null;
    $description = $_POST['description'] ?? null;

    // // Vérifier si tous les champs sont remplis
    // if (empty($title) || empty($category) || empty($genre) || empty($price) || empty($author) || empty($year) || empty($isbn) || empty($description)) {
    //     $erreur = "Tous les champs sont requis.";
    // }

    // Gérer l'upload de l'image
    $image = $_FILES['image'] ?? null;
    $image_name = "default.jpg"; // Valeur par défaut si aucune image n'est téléchargée

    if ($image && $image['error'] == 0) {
        // Vérifier l'extension de l'image
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $image_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        if (in_array($image_ext, $valid_extensions)) {
            $image_name = uniqid() . '.' . $image_ext;
            $image_path = "../uploads/" . $image_name; // Répertoire de destination
            move_uploaded_file($image['tmp_name'], $image_path);
        } else {
            $erreur = "L'image doit être au format jpg, jpeg, png, ou gif.";
        }
    }

    // Vérifier si le livre existe déjà (basé sur le ISBN ou un autre critère)
    if (empty($erreur)) {
        try {
            $checkQuery = "SELECT COUNT(*) FROM book WHERE isbn = :isbn OR (titre = :title AND auteur_id = :author)";
            $checkStmt = $connexion->prepare($checkQuery);
            $checkStmt->bindParam(':isbn', $isbn);
            $checkStmt->bindParam(':title', $title);
            $checkStmt->bindParam(':author', $author);
            $checkStmt->execute();
            $exists = $checkStmt->fetchColumn();

            if ($exists > 0) {
                $erreur = "Ce livre existe déjà dans la base de données.";
            } else {
                // Si aucune erreur, procéder à l'insertion dans la base de données
                $query = "INSERT INTO book (titre, auteur_id, categorie_id, annee_publication, genre, prix, isbn, description, photo) 
                          VALUES (:title, :author, :category, :year, :genre, :price, :isbn, :description, :photo)";
                $stmt = $connexion->prepare($query);

                // Lier les paramètres
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':author', $author);
                $stmt->bindParam(':category', $category);
                $stmt->bindParam(':year', $year);
                $stmt->bindParam(':genre', $genre);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':isbn', $isbn);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':photo', $image_name);

                // Exécuter la requête
                $stmt->execute();
                $success = "Le livre a été ajouté avec succès !";
            }
        } catch (PDOException $e) {
            $erreur = "Erreur lors de l'insertion du livre : " . $e->getMessage();
        }
    }
}
?>
