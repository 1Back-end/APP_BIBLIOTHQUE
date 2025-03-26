<?php include("../include/menu.php"); ?>
<?php include("../controllers/request.php"); ?>
<style>
    .custom-select-lg option {
        font-size: 12px;
        padding: 5px; /* Add padding for better spacing */
        cursor: pointer;
    }

    .custom-select-lg {
        font-size: 18px; /* Ensure the select itself is slightly larger */
        cursor: pointer;
    }
</style>

<div class="container-fluid pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="border-left-primary  card shadow-sm p-3 border-0">
            <h3 class=" mb-0 text-gray-800 text-uppercase fw-bold text-center">Ajouter un livre</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 mb-3">
        <?php include("process_add_book.php") ?>  

    <?php if (!empty($success)) : ?>
        <div id="success-message" class="alert alert-success text-center border-0" role="alert">
            <?= $success ?>
        </div>
    <?php endif; ?>

    </div>
    <div class="col-md-12 col-sm-12">
        <div class="card border-left-primary  shadow-sm p-3 border-0">
        <form  class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="mb-3">
                        <label for="title">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" required id="title" name="title">
                        <div class="invalid-feedback">
                            Ce champ est requis !
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="category">Catégorie <span class="text-danger">*</span></label>
                        <select name="category" class="custom-select custom-select-lg ps-3" required id="category">
                            <option disabled selected value="">Choisir une option</option>
                            <?php foreach ($all_categories as $category): ?>
                                <option value="<?= htmlspecialchars($category['id']) ?>">
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Ce champ est requis !
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="genre">Genre <span class="text-danger">*</span></label>
                        <select name="genre" class="custom-select custom-select-lg ps-3" required id="genre">
                            <option selected disabled value="">Choisir une option</option>
                            <?php foreach ($genres as $genre): ?>
                                <option value="<?= $genre ?>"><?= $genre ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Ce champ est requis !
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="price">Prix <span class="text-danger">*</span></label>
                        <input type="number" min="0" class="form-control form-control-lg" required id="price" name="price">
                        <div class="invalid-feedback">
                            Ce champ est requis !
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="mb-3">
                        <label for="author">Auteur <span class="text-danger">*</span></label>
                        <select name="author" class="custom-select custom-select-lg ps-3" required id="author">
                            <option disabled selected value="">Choisir une option</option>
                            <?php foreach ($all_authors as $author): ?>
                                <option value="<?= htmlspecialchars($author['id']) ?>">
                                    <?= htmlspecialchars($author['first_name'] . ' ' . $author['last_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Ce champ est requis !
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="year">Année publication <span class="text-danger">*</span></label>
                        <select name="year" class="custom-select custom-select-lg ps-3" required id="year">
                            <option disabled selected value="">Choisir une option</option>
                            <?php foreach ($years as $year): ?>
                                <option value="<?= $year ?>"><?= $year ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Ce champ est requis !
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="isbn">ISBN <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" required id="isbn" name="isbn">
                        <div class="invalid-feedback">
                            Ce champ est requis !
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control-file form-control-lg" required id="image" name="image">
                        <div class="invalid-feedback">
                            Ce champ est requis !
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control form-control-lg" required rows="3" id="description" name="description"></textarea>
                    <div class="invalid-feedback">
                            Ce champ est requis !
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-3 mt-3">
                <button type="submit" name="submit" class="btn btn-primary py-3 ps-2 mx-2 shadow-none">Enregistrer</button>
                <a href="livres.php" class="btn btn-secondary py-3 ps-2 mx-2 shadow-none">Retour à la liste des livres</a>
            </div>
        </form>
        </div>
    </div>
    </div>
