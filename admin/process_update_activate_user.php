<?php
include("../database/connexion.php");

if (isset($_GET["admin_uuid"])) {
    $id_user = $_GET["admin_uuid"];
    
    try {
        $stmt = $connexion->prepare("UPDATE admin_users SET is_active = 1 WHERE admin_uuid = :id_user");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: utilisateurs.php?message=" . urlencode("Utilisateur activé avec succès"));
            exit();
        } else {
            header("Location: utilisateurs.php?message=" . urlencode("Aucune modification effectuée"));
            exit();
        }
    } catch (Exception $e) {
        header("Location: utilisateurs.php?message=" . urlencode("Erreur : " . $e->getMessage()));
        exit();
    }
} else {
    header("Location: utilisateurs.php?message=" . urlencode("Erreur : ID utilisateur manquant $id_user"));
    exit();
}