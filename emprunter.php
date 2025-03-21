<?php
session_start();
include('database/connexion.php'); // Fichier pour la connexion à la base de données

if (isset($_SESSION['user_uuid']) && isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $user_id = $_SESSION['user_uuid'];

    // Préparer la requête d'insertion dans la table des emprunts
    $query = "INSERT INTO emprunts (user_id, book_id, date_emprunt) VALUES (:user_id, :book_id, NOW())";
    $stmt = $connexion->prepare($query);
    
    // Lier les paramètres et exécuter la requête
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':book_id', $book_id);
    
    if ($stmt->execute()) {
        // Si l'emprunt est réussi, rediriger avec un message de succès
        $_SESSION['alert'] = 'Livre emprunté avec succès !';
        header('Location: index.php'); // Redirige vers la page d'accueil
        exit;
    } else {
        // Si l'insertion échoue, afficher un message d'erreur
        $_SESSION['alert'] = 'Une erreur est survenue. Veuillez réessayer.';
        header('Location: index.php'); // Redirige vers la page d'accueil
        exit;
    }
}
?>
