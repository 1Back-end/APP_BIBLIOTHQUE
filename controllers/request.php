<?php include("../database/connexion.php"); ?>

<?php 

function get_all_categories($connexion){
    $requete = $connexion->prepare("SELECT * FROM categories ORDER BY created_at DESC");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}
$all_categories = get_all_categories($connexion);

function get_all_autors($connexion){
    $requete = $connexion->prepare("SELECT * FROM authors ORDER BY created_at DESC");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}
$all_authors = get_all_autors($connexion);


function get_all_books($connexion) {
    try {
        // Requête SQL pour récupérer les livres avec les informations des catégories et des auteurs
        $query = "SELECT 
                    b.id, 
                    b.titre, 
                    b.genre, 
                    b.isbn, 
                    b.created_at, 
                    b.photo, 
                    c.name AS categorie_name, 
                    a.first_name, 
                    a.last_name 
                  FROM 
                    book b
                  JOIN 
                    categories c ON b.categorie_id = c.id
                  JOIN 
                    authors a ON b.auteur_id = a.id";
        
        // Préparer et exécuter la requête
        $stmt = $connexion->prepare($query);
        $stmt->execute();

        // Retourner tous les résultats sous forme de tableau
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message
        echo "Erreur : " . $e->getMessage();
    }
}
$all_books = get_all_books($connexion);


function get_all_emprunts($connexion) {
    $query = "SELECT e.id, b.titre AS livre, u.username AS utilisateur, b.photo AS photo_livre, e.date_emprunt, e.date_retour_estimee, e.date_retour_reel, e.status 
              FROM emprunts e
              JOIN book b ON e.book_id = b.id
              JOIN users u ON e.user_id = u.user_uuid
              ORDER BY e.date_emprunt DESC";

    $stmt = $connexion->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$emprunts = get_all_emprunts($connexion);

function get_info_users($connexion, $uuid_admin){
    global $_SESSION; // Déclare $_SESSION comme globale
    $query = "SELECT * FROM admin_users WHERE admin_uuid = :admin_uuid";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':admin_uuid', $_SESSION['admin_uuid']);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_count_author($connexion){
    $query = "SELECT COUNT(*) FROM authors";
    $stmt = $connexion->query($query);
    return $stmt->fetchColumn();    
}
$count_author = get_count_author($connexion);

function get_count_books($connexion){
    $query = "SELECT COUNT(*) FROM book";
    $stmt = $connexion->query($query);
    return $stmt->fetchColumn();
}
$count_books = get_count_books($connexion);

function get_count_admin($connexion){
    $query="SELECT COUNT(*) as total FROM admin_users WHERE is_deleted =0";
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    return $stmt->fetchColumn();
}
$total_users = get_count_admin($connexion);

function get_count_emprunts($connexion){
    $query = "SELECT COUNT(*) FROM emprunts";
    $stmt = $connexion->query($query);
    return $stmt->fetchColumn();
}
function generatePassword($length = 12) {
    // Définir les caractères utilisés dans le mot de passe
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=';
    // Initialiser une variable pour stocker le mot de passe généré
    $password = '';
    
    // Boucle pour construire le mot de passe
    for ($i = 0; $i < $length; $i++) {
        // Choisir un caractère aléatoire
        $password .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return $password;
}

function get_all_users($connexion){
    $query = "SELECT * FROM admin_users WHERE is_deleted = 0  ORDER BY created_at DESC";
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

$all_users = get_all_users($connexion);

$count_emprunts = get_count_emprunts($connexion);

function get_counts_categories($connexion){
    $query = "SELECT COUNT(*) FROM categories";
    $stmt = $connexion->query($query);
    return $stmt->fetchColumn();
}
$count_categories = get_counts_categories($connexion);

function get_years() {
    $current_year = date('Y'); // Année actuelle
    $years = [];
    
    // Générer les années de 1960 jusqu'à l'année actuelle
    for ($year = 1960; $year <= $current_year; $year++) {
        $years[] = $year;
    }

    return $years;
}
// Exemple d'utilisation
$years = get_years();

// Fonction pour récupérer les genres
function get_genre() {     
    // Liste des genres de livres     
    return [         
        'Fiction',         
        'Non-Fiction',         
        'Fantasy',         
        'Science-fiction'     
    ]; 
} 

// Exemple d'utilisation 
$genres = get_genre();

