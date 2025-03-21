<?php
include("../database/connexion.php");

$erreur = "";
$success = "";

// Traitement du formulaire
if (isset($_POST['submit'])) {
    $first_name = $_POST['prenom'] ?? null;
    $last_name = $_POST['nom'] ?? null;
    $email = $_POST['email'] ?? null;
    $nationality = $_POST['nationalite'] ?? null;
    $phone_number = $_POST['telephone'] ?? null;
    $photo = $_FILES['photo'] ?? null;

    // Validation des champs obligatoires
    if (!$first_name || !$last_name || !$email || !$nationality || !$phone_number) {
        $erreur = "Tous les champs sont requis !";
    } else {
        try {
            // Vérifier si l'email existe déjà
            $stmt = $connexion->prepare("SELECT id FROM authors WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                $erreur = "Cet email est déjà utilisé.";
            } else {
                $photo_name = null;

                // Vérification si une photo a été téléchargée
                if ($photo && $photo['tmp_name']) {
                    // Vérification de l'extension de la photo
                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                    $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
                    if (in_array(strtolower($extension), $allowed_extensions)) {
                        // Générer un nom unique pour la photo
                        $photo_name = uniqid() . "_" . basename($photo['name']);
                        // Déplacer le fichier vers le répertoire de téléchargement
                        if (move_uploaded_file($photo['tmp_name'], "../uploads/" . $photo_name)) {
                            // Débogage pour vérifier que le fichier est bien déplacé
                            // echo "Photo téléchargée avec succès : " . $photo_name;

                            // Insérer l'auteur dans la base de données
                            $query = "INSERT INTO authors (first_name, last_name, email, nationality, phone_number, photo, created_at, updated_at) 
                                      VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
                            $stmt = $connexion->prepare($query);
                            $stmt->execute([$first_name, $last_name, $email, $nationality, $phone_number, $photo_name]);
                            $success = "Auteur ajouté avec succès !";
                        } else {
                            $erreur = "Échec de l'upload de la photo.";
                        }
                    } else {
                        $erreur = "L'extension de la photo n'est pas autorisée.";
                    }
                }

                // Si pas de photo, insérer avec une valeur nulle
                if (!$photo_name) {
                    // Insérer l'auteur sans photo
                    $query = "INSERT INTO authors (first_name, last_name, email, nationality, phone_number, photo, created_at, updated_at) 
                              VALUES (?, ?, ?, ?, ?, NULL, NOW(), NOW())";
                    $stmt = $connexion->prepare($query);
                    $stmt->execute([$first_name, $last_name, $email, $nationality, $phone_number]);
                    $success = "Auteur ajouté avec succès sans photo.";
                }
            }
        } catch (PDOException $e) {
            $erreur = "Erreur : " . $e->getMessage();
        }
    }
}
?>
