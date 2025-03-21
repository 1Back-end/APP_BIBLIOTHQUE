<?php
include("../database/connexion.php");

if (isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $first_name = $_POST['prenom'] ?? null;
    $last_name = $_POST['nom'] ?? null;
    $email = $_POST['email'] ?? null;
    $nationality = $_POST['nationalite'] ?? null;
    $phone_number = $_POST['telephone'] ?? null;
    $photo = $_FILES['photo'] ?? null;
    $id_autor = $_GET['id'] ?? null;

    // Validation des champs obligatoires
    if (!$first_name || !$last_name || !$email || !$nationality || !$phone_number) {
        $erreur = "Tous les champs sont requis !";
    } else {
        try {
            // Vérification si l'email est unique
            $stmt = $connexion->prepare("SELECT id FROM authors WHERE email = ? AND id != ?");
            $stmt->execute([$email, $id_autor]);
            if ($stmt->rowCount() > 0) {
                $erreur = "Cet email est déjà utilisé.";
            } else {
                // Gestion de la photo
                $photo_name = null;

                if ($photo && $photo['tmp_name']) {
                    // Vérification de l'extension de la photo
                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                    $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
                    if (in_array(strtolower($extension), $allowed_extensions)) {
                        // Générer un nom unique pour la photo
                        $photo_name = uniqid() . "_" . basename($photo['name']);
                        // Déplacer le fichier vers le répertoire de téléchargement
                        if (!move_uploaded_file($photo['tmp_name'], "../uploads/" . $photo_name)) {
                            $erreur = "Échec de l'upload de la photo.";
                        }
                    } else {
                        $erreur = "L'extension de la photo n'est pas autorisée.";
                    }
                } else {
                    // Si aucune photo n'est téléchargée, ne pas modifier la photo
                    $photo_name = null;
                }

                // Si une photo a été téléchargée, mettre à jour la photo dans la base de données
                if ($photo_name) {
                    $query = "UPDATE authors SET first_name = ?, last_name = ?, email = ?, nationality = ?, phone_number = ?, photo = ?, updated_at = NOW() WHERE id = ?";
                    $stmt = $connexion->prepare($query);
                    $stmt->execute([$first_name, $last_name, $email, $nationality, $phone_number, $photo_name, $id_autor]);
                } else {
                    // Si aucune photo n'est téléchargée, ne pas modifier la photo
                    $query = "UPDATE authors SET first_name = ?, last_name = ?, email = ?, nationality = ?, phone_number = ?, updated_at = NOW() WHERE id = ?";
                    $stmt = $connexion->prepare($query);
                    $stmt->execute([$first_name, $last_name, $email, $nationality, $phone_number, $id_autor]);
                }

                $success = "Auteur mis à jour avec succès !";
            }
        } catch (PDOException $e) {
            $erreur = "Erreur : " . $e->getMessage();
        }
    }
}

?>
