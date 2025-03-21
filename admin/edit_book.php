<?php include("../include/menu.php"); ?>
<?php include("../controllers/request.php"); ?>
<?php 
include("../database/connexion.php");

if (isset($_GET["id"])) {
    $id_book = $_GET["id"];
    $query = $connexion->prepare('SELECT * FROM book WHERE id = :id');
    $query->bindParam(':id', $id_book);  // Corrected variable name from $id_autor to $id_book
    $query->execute();
    $book = $query->fetch(PDO::FETCH_OBJ);
}
?>
<div class="container-fluid pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="border-left-primary  card shadow-sm p-3 border-0">
            <h3 class=" mb-0 text-gray-800 text-uppercase fw-bold text-center">Modifier un livre</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 mb-3">
        <?php include("process_update_book.php") ?>  

    <?php if (!empty($erreur)) : ?>
        <div id="error-message" class="alert alert-danger text-center border-0" role="alert">
            <?= $erreur ?> !
        </div>
    <?php endif; ?>

    <?php if (!empty($success)) : ?>
        <div id="success-message" class="alert alert-success text-center border-0" role="alert">
            <?= $success ?>
        </div>
    <?php endif; ?>

    </div>
    <div class="col-md-12 col-sm-12">
    <div class="card border-left-primary shadow-sm p-3 border-0">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="mb-3">
                        <label for="title">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($book->titre ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="category">Catégorie <span class="text-danger">*</span></label>
                        <select name="category" class="form-control" id="category">
                            <option disabled selected>Choisir une option</option>
                            <?php foreach ($all_categories as $category): ?>
                                <option value="<?= htmlspecialchars($category['id']) ?>" <?= $category['id'] == $book->categorie_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="genre">Genre <span class="text-danger">*</span></label>
                        <select name="genre" class="form-control" id="genre">
                            <option disabled selected>Choisir une option</option>
                            <?php foreach ($genres as $genre): ?>
                                <option value="<?= $genre ?>" <?= $genre == $book->genre ? 'selected' : '' ?>><?= $genre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price">Prix <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="price" name="price" value="<?= htmlspecialchars($book->prix ?? '') ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-3">
                    <div class="mb-3">
                        <label for="author">Auteur <span class="text-danger">*</span></label>
                        <select name="author" class="form-control" id="author">
                            <option disabled selected>Choisir une option</option>
                            <?php foreach ($all_authors as $author): ?>
                                <option value="<?= htmlspecialchars($author['id']) ?>" <?= $author['id'] == $book->auteur_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($author['first_name'] . ' ' . $author['last_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="year">Année publication <span class="text-danger">*</span></label>
                        <select name="year" class="form-control" id="year">
                            <option disabled selected>Choisir une option</option>
                            <?php foreach ($years as $year): ?>
                                <option value="<?= $year ?>" <?= $year == $book->annee_publication ? 'selected' : '' ?>><?= $year ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isbn">ISBN <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?= htmlspecialchars($book->isbn ?? '') ?>">
                    </div>

                    <div class="mb-3">
                    <label for="image">Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    <!-- Champ caché pour l'image existante -->
                    <input type="hidden" name="existing_image" value="<?= htmlspecialchars($book->photo ?? 'default.jpg') ?>">
                </div>
                <!-- autres champs ici -->

                </div>
                <div class="col-md-12 col-sm-12">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="3" id="description" name="description"><?= htmlspecialchars($book->description ?? '') ?></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-3 mt-3">
                <button type="submit" name="submit" class="btn btn-primary py-3 ps-2 mx-2 shadow-none">Enregistrer</button>
                <a href="livres.php" class="btn btn-secondary py-3 ps-2 mx-2 shadow-none">Retour à la liste des livres</a>
            </div>
        </form>
    </div>
</div>
