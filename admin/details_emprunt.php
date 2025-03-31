<?php include("../include/menu.php");?>
<?php include("../database/connexion.php");?>

<?php if(isset($_GET['id'])){
    $id_emprunt = $_GET['id'];
    $query = "SELECT e.id, b.titre AS livre, u.username AS _username_utilisateur, 
            u.email AS email_utilisateur, u.address AS address_utilisateur,
            u.phone_number as phone_number_utilisateur, u.photo AS photo_utilisateur,
            u.created_at AS created_at_utilisateur,
            b.photo AS photo_livre, e.date_emprunt, e.date_retour_estimee, 
            e.date_retour_reel, e.status,
            b.id, b.titre,  b.genre, b.isbn, b.created_at, b.photo, 
            b.annee_publication,b.description,c.name AS categorie_name,
            a.first_name, a.last_name 
            FROM emprunts e
            JOIN book b ON e.book_id = b.id
            JOIN categories c ON b.categorie_id = c.id
            JOIN  authors a ON b.auteur_id = a.id
            JOIN users u ON e.user_id = u.user_uuid  WHERE e.id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->execute(['id' => $id_emprunt]);
    $emprunts = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<div class="container-fluid mt-3 pb-3">
    <!-- <?php var_dump($emprunts); ?> -->
   <div class="col-md-12 col-sm-12 mb-3">
    <div class="row">
        <div class="col-lg-4 col-sm-12 mb-3">
            <div class="card h-100 shadow-sm p-3 border-0">
            <div class="mb-3">
                <h4 class="fw-bold text-uppercase text-gray-800">Informations de l'utilisateur</h4>
            </div>
            <h5 class="mb-2"><strong>Nom complet :</strong> <?= htmlspecialchars($emprunts['_username_utilisateur']) ?></h5>
            <h5 class="mb-2"><strong>Email :</strong> <?= htmlspecialchars($emprunts['email_utilisateur']) ?></h5>
            <h5 class="mb-2"><strong>Adresse :</strong>
                <?php if(!empty($emprunts['address_utilisateur'])) : ?> 
                    <?= htmlspecialchars($emprunts['address_utilisateur']) ?>
                <?php else : ?>
                    Non renseigné pour le moment !
                <?php endif; ?>
            </h5>
            <h5 class="mb-2"><strong>Numéro de téléphone :</strong>
                <?php if(!empty($emprunts['phone_number_utilisateur'])) : ?> 
                    <?= htmlspecialchars($emprunts['phone_number_utilisateur']) ?>
                <?php else : ?>
                    Non renseigné pour le moment !
                <?php endif; ?>
            </h5>
            <h5 class="mb-2"><strong>C'est enregistré(e) le :</strong> <?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunts['created_at_utilisateur']))) ?></h5>
            </div>
        </div>



        <div class="col-lg-4 col-sm-12 mb-3">
            <div class="card h-100 shadow-sm p-3 border-0">
            <div class="mb-3">
                <h4 class="fw-bold text-uppercase text-gray-800">Informations de livre</h4>
            </div>
            <h5 class="mb-2"><strong>Titre :</strong> <?= htmlspecialchars($emprunts['titre']) ?></h5>
                        <h5 class="mb-2"><strong>Genre :</strong> <?= htmlspecialchars($emprunts['genre']) ?></h5>
                        <h6 class="mb-2"><strong>Année de publication :</strong> <?= htmlspecialchars($emprunts['annee_publication']) ?></h6>
                        <h6 class="mb-2"><strong>Auteur :</strong> <?= htmlspecialchars($emprunts['first_name'] . ' ' . $emprunts['last_name']) ?></h6>
                        <h6 class="mb-2"><strong>Catégorie :</strong> <?= htmlspecialchars($emprunts['categorie_name']) ?></h6>
                        <h6 class="mb-2"><strong>Genre :</strong> <?= htmlspecialchars($emprunts['genre']) ?></h6>
                        <h6 class="mb-2"><strong>ISBN :</strong> <?= htmlspecialchars($emprunts['isbn']) ?></h6>
                        <h6 class="mb-2"><strong>Date de création :</strong> <?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunts['created_at']))) ?></h6>
                        <h6 class="mb-2"><strong>Description :</strong> <?= htmlspecialchars($emprunts['description']) ?></h6>
        </div>
        </div>




        <div class="col-lg-4 col-sm-12 mb-3">
            <div class="card h-100 shadow-sm p-3 border-0">
                <div class="mb-3">
                    <h4 class="fw-bold text-uppercase text-gray-800">Informations de l'emprunt</h4>
                </div>
                    <div class="mb-3">
                       
                        <h6 class="mb-3"><strong>Date d'emprunt :</strong> <?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunts['date_emprunt']))) ?></h6>
                        <h6 class="mb-3"><strong>Date retour prévue :</strong> <?= $emprunts['date_retour_estimee'] ? htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunts['date_retour_estimee']))) : 'Non renseigné  !' ?></h6>
                        <h6 class="mb-3"><strong>Date retour prévue :</strong> <?= $emprunts['date_retour_reel'] ? htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunts['date_retour_reel']))) : 'Non renseigné !' ?></h6>
                        <h5 class="mb-3"><strong>Statut :</strong> 
                        <?php if ($emprunts['status'] == 'en cours') : ?>
                                    <span class="badge bg-warning py-2 ps-2 shadow-none text-white">En cours</span>
                                <?php elseif ($emprunts['status'] == 'approuvé') : ?>
                                    <span class="badge bg-success py-2 ps-2 shadow-none text-white">Approuvé</span>
                                <?php elseif ($emprunts['status'] == 'rejetté') : ?>
                                    <span class="badge bg-danger py-2 ps-2 shadow-none text-white">Rejetté</span>
                                <?php elseif ($emprunts['status'] == 'retournée') : ?>
                                    <span class="badge bg-primary py-2 ps-2 shadow-none text-white">Retournée</span>
                        <?php endif; ?>
                        </h5>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
   </div>
</div>