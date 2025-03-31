<?php include("../include/menu.php");?>
<?php include("../controllers/request.php");?>

<div class="main-container mt-3 pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="row">
            <div class="col-lg-6 col-sm-12 mb-3">
                <div class="card shadow-sm border-0 p-3">
                    <form action="" class="needs-validation" novalidate method="post">
                        <div class="mb-3">
                            <h6 class="text-uppercase fw-bold">Créer une catégorie</h6>
                        </div>
                        <div class="mb-3">
                            <label for="">Nom de la catégorie <span class="text-danger">*</span></label>
                            <input type="text" name="name" required id="validationCustom03" class="form-control form-control-lg py-3 ps-3">
                            <div class="invalid-feedback">
                                Ce champ est requis !
                            </div>

                            
                            <?php include("process_add_categories.php")?>  
                            

                            <?php if (!empty($success)) : ?>
                                <div id="success-message" class="text-success" role="alert">
                                    <?= $success ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary py-2 ps-3 shadow-none text-white btn-responsive">
                                    <i class="fas fa-plus-circle"></i> Créer
                                </button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 mb-3">
                <div class="card shadow-sm border-0 p-3">
                    <h6 class="text-uppercase fw-bold mb-3">Liste des catégories</h6>
                    <div class="mb-3">
                    <?php if(!empty($_GET["message"])) : ?>
                            <?php $message = $_GET["message"]; ?>
                            <span class="text-info"><?php echo $message; ?> !</span>
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Crée le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                            // Récupérer toutes les catégories depuis la base de données
                            $all_categories = get_all_categories($connexion);

                            // Vérifier si des catégories existent
                            if (count($all_categories) > 0) {
                                foreach ($all_categories as $index => $category) {
                            ?>
                                    <tr>
                                        <td><?= ($index + 1) ?></td> <!-- Afficher l'index de la catégorie -->
                                        <td><?= htmlspecialchars($category['name']) ?></td> <!-- Afficher le nom de la catégorie -->
                                        <td><?= date('d-m-Y H:i:s', strtotime($category['created_at'])) ?></td> <!-- Afficher la date de création -->
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a href="delete_category.php?id=<?= $category['id'] ?>" class="btn btn-danger btn-sm btn-xs shadow-none">Supprimer</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                            ?>
                                <tr>
                                    <td colspan="10">Aucun élément trouvé</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
