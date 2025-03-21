<?php 
include("../include/menu.php"); 
include("../database/connexion.php");

if (isset($_GET["id"])) {
    $id_book = $_GET["id"];
    $query = "SELECT 
                b.id, 
                b.titre, 
                b.genre, 
                b.isbn, 
                b.created_at, 
                b.photo, 
                b.annee_publication,
                b.description,
                c.name AS categorie_name,
                a.first_name, 
                a.last_name 
              FROM 
                book b
              JOIN 
                categories c ON b.categorie_id = c.id
              JOIN 
                authors a ON b.auteur_id = a.id
              WHERE 
                b.id = :id";

    $stmt = $connexion->prepare($query);
    $stmt->execute(['id' => $id_book]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="container-fluid pb-5">
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm p-3 border-0">
            <h3 class="h3 mb-0 text-gray-800 text-uppercase fw-bold text-center">Détails du livre N° <?= htmlspecialchars($book['id']) ?></h3>
            <div class="card-body">
                <div class="row">
                    <!-- Image à gauche -->
                    <div class="col-md-4 col-sm-12 mb-3">
                        <img src="../uploads/<?= htmlspecialchars($book['photo']) ?>" alt="Image du livre" class="img-fluid" style="max-width: 100%; height: auto;">
                    </div>
                    <!-- Informations à droite -->
                    <div class="col-md-8 col-sm-12">
                        <h5 class="mb-2"><strong>Titre :</strong> <?= htmlspecialchars($book['titre']) ?></h5>
                        <h5 class="mb-2"><strong>Genre :</strong> <?= htmlspecialchars($book['genre']) ?></h5>
                        <h6 class="mb-2"><strong>Année de publication :</strong> <?= htmlspecialchars($book['annee_publication']) ?></h6>
                        <h6 class="mb-2"><strong>Auteur :</strong> <?= htmlspecialchars($book['first_name'] . ' ' . $book['last_name']) ?></h6>
                        <h6 class="mb-2"><strong>Catégorie :</strong> <?= htmlspecialchars($book['categorie_name']) ?></h6>
                        <h6 class="mb-2"><strong>Genre :</strong> <?= htmlspecialchars($book['genre']) ?></h6>
                        <h6 class="mb-2"><strong>ISBN :</strong> <?= htmlspecialchars($book['isbn']) ?></h6>
                        <h6 class="mb-2"><strong>Date de création :</strong> <?= htmlspecialchars($book['created_at']) ?></h6>
                    </div>
                </div>
                <h6 class="mb-2"><strong>Description :</strong> <?= htmlspecialchars($book['description']) ?></h6>
            </div>
        </div>
    </div>
</div>
