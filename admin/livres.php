<?php include("../include/menu.php"); ?>
<?php include("../controllers/request.php"); ?>
<div class="container-fluid pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="mr-auto">
                <h3 class="h3 mb-0 text-gray-800 text-uppercase fw-bold">Liste des livres</h3>
            </div>
            <div class="ml-auto">
                <a href="add_book.php" class="btn  shadow-none btn-primary py-3 ps-2 fw-bold border-0">
                    <i class="fas fa-plus-circle"></i> &nbsp; Ajouter
                </a>
            </div>
        </div>
        </div>
    <div class="col-md-12 col-sm-12 mb-3">
    <div class="card shadow-sm p-3">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Catégorie</th>
                        <th>Genre</th>
                        <th>ISBN</th>
                        <th>Crée le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_books as $row) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td>
                                <!-- Afficher l'image du livre avec le bon chemin -->
                                <img src="../uploads/<?php echo $row['photo']; ?>" alt="Image du livre" width="50">
                            </td>
                            <td><?php echo $row['titre']; ?></td>
                            <td><?php echo $row['first_name'] . ' ' . $row["last_name"]; ?></td>
                            <td><?php echo $row['categorie_name']; ?></td>
                            <td><?php echo $row['genre']; ?></td>
                            <td><?php echo $row['isbn']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td class="d-flex align-items-center justify-content-center">
                                <a href="edit_book.php?id=<?= $row['id']?>" class="btn shadow-none btn-warning py-2 px-2 mx-2 rounded-0">
                                    <i class="fas fa-pencil-alt"></i> &nbsp; Modifier
                                </a>

                                <a href="delete_book.php?id=<?= $row['id']?>" class="btn shadow-none btn-danger py-2 px-2 mx-2 rounded-0">
                                    <i class="fas fa-trash-alt"></i> &nbsp; Modifier
                                </a>

                                <a href="details_book.php?id=<?= $row['id'] ?>" class="btn shadow-none btn-info py-2 px-2 mx-2 rounded-0">
                                <i class="fas fa-info-circle"></i> &nbsp; Détails
                            </a>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>