<?php include("../include/menu.php"); ?>

<?php 
include("../database/connexion.php");

if (isset($_GET["id"])) {
    $id_autor = $_GET["id"];
    $query = $connexion->prepare('SELECT * FROM authors WHERE id = :id');
    $query->bindParam(':id', $id_autor);
    $query->execute();
    $autor = $query->fetch(PDO::FETCH_OBJ);
}
?>

<div class="container-fluid pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="card shadow-sm p-3 border-0">
            <h3 class="h3 mb-0 text-gray-800 text-uppercase fw-bold text-center">modifier un auteur</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 mb-3">
        <?php include("process_update_autor.php") ?>  

    <?php if (!empty($erreur)) : ?>
        <div id="error-message" class="alert alert-danger text-center border-0" role="alert">
            <?= $erreur ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($success)) : ?>
        <div id="success-message" class="alert alert-success text-center border-0" role="alert">
            <?= $success ?>
        </div>
    <?php endif; ?>

    </div>
    <div class="col-md-12 col-sm-12 mb-3">
    <div class="card shadow-sm p-3 border-0">
        <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                <div class="mb-3">
                        <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo htmlspecialchars($autor->last_name ?? ''); ?>" 
                               class="form-control form-control-lg" id="nom" name="nom" required>
                        <div class="invalid-feedback">
                            Ce champ est requis !
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo htmlspecialchars($autor->first_name ?? ''); ?>" 
                               class="form-control form-control-lg" id="prenom" name="prenom" required>
                               <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="nationalite" class="form-label">Nationalité <span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo htmlspecialchars($autor->nationality ?? ''); ?>" 
                               class="form-control ps-2 py-3 form-control-lg" id="nationalite" name="nationalite" required>
                               <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" value="<?php echo htmlspecialchars($autor->email ?? ''); ?>" 
                               class="form-control ps-2 py-3 form-control-lg" id="email" name="email" required>
                               <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Numéro de téléphone <span class="text-danger">*</span></label>
                        <input type="tel" value="<?php echo htmlspecialchars($autor->phone_number ?? ''); ?>" 
                               class="form-control ps-2 py-3 form-control-lg" id="telephone" name="telephone" required>
                               <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mb-3">
                <button type="submit" name="submit" class="btn btn-primary py-3 ps-2 mx-2 shadow-none">Enregistrer</button>
                <a href="auteurs.php" class="btn btn-secondary py-3 ps-2 mx-2 shadow-none">Retour à la liste des auteurs</a>
            </div>
        </form>
    </div>
</div>