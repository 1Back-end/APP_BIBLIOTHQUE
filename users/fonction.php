<?php
include_once("../database/connexion.php"); // Assurez-vous d'utiliser une connexion PDO

$user_id = $_SESSION['user_uuid'];
// echo $user_id;

function get_user_emprunts($connexion, $user_id) {
    $query = "SELECT e.id, b.titre AS livre, u.username AS utilisateur, b.photo AS photo_livre, e.date_emprunt, e.date_retour_estimee, e.date_retour_reel, e.status, 
                     c.name AS categories, a.first_name, a.last_name 
              FROM emprunts e
              JOIN book b ON e.book_id = b.id
              JOIN users u ON e.user_id = u.user_uuid
              JOIN categories c ON b.categorie_id = c.id
              JOIN authors a ON b.auteur_id = a.id
              WHERE e.user_id = :user_id
              ORDER BY e.date_emprunt DESC";

    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$emprunts = get_user_emprunts($connexion, $user_id);



function get_info_users($connexion,$user_id){
    $query = "SELECT * FROM users WHERE user_uuid  = :user_id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
$user_info = get_info_users($connexion, $user_id);

?>