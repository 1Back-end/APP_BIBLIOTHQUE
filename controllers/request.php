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

