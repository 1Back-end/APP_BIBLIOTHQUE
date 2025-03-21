<?php include("../include/menu.php"); ?>

<div class="container-fluid pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="card shadow-sm p-3 border-0">
            <h3 class="h3 mb-0 text-gray-800 text-uppercase fw-bold text-center">Ajouter un auteur</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 mb-3">
        <?php include("process_add_autor.php") ?>  

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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="mb-3">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control ps-2 py-3" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="">Nationalité <span class="text-danger">*</span></label>
                            <input type="text" class="form-control ps-2 py-3" id="nationalite" name="nationalite">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control ps-2 py-3" id="prenom" name="prenom">
                        </div>
                        <div class="mb-3">
                            <label for="">Numéro de téléphone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control ps-2 py-3" id="telephone" name="telephone">
                        </div>
                        <div class="mb-3">
                            <label for="">Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <button type="submit"  name="submit" class="btn btn-primary py-3 ps-2 mx-2 shadow-none">Enregistrer</button>
                        <a href="auteurs.php" class="btn btn-secondary py-3 ps-2 mx-2 shadow-none">Retour à la liste des auteurs</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>