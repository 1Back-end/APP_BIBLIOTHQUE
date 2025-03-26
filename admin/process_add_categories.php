<?php
include("../database/connexion.php");

$erreur = "";
$success = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'] ?? null;
        // Vérifier si une catégorie avec le même nom existe déjà
    $query = $connexion->prepare("SELECT COUNT(*) FROM categories WHERE name = :name");
    $query->execute(['name' => $name]);
    $existingCategory = $query->fetchColumn();

    if ($existingCategory > 0) {
    $erreur = "Cette catégorie existe déjà.";
    } else {
            // Si la catégorie n'existe pas, on peut l'insérer dans la base
    $insert = $connexion->prepare("INSERT INTO categories (name) VALUES (:name)");
    $insert->execute(['name' => $name]);
    $success = "Catégorie créée avec succès.";
    }
    }

?>
