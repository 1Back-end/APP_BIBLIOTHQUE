<?php include("../include/menu.php"); ?>
<?php include("../controllers/request.php"); ?>

<div class="container-fluid pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="mr-auto">
                <h3 class="h3 mb-0 text-gray-800 text-uppercase fw-bold">Liste des auteurs</h3>
            </div>
            <div class="ml-auto">
                <a href="add_author.php" class="btn  shadow-none btn-primary py-3 ps-2 fw-bold">
                    <i class="fas fa-plus-circle"></i> &nbsp; Ajouter
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 mb-3 mb-3">
    <?php if (!empty($_GET["message"])) : ?>
    <?php $message = $_GET["message"]; ?>
    <div class="alert alert-success text-center border-0" role="alert">
        <?php echo htmlspecialchars($message); ?> !
    </div>
    <?php endif; ?>

    </div>

    <div class="col-md-12 col-sm-12 mb-3">
    <div class="card shadow-sm border-0 p-3">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Nom complet</th>
                        <th>Email</th>
                        <th>Nationalité</th>
                        <th>N° Téléphone</th>
                        <th>Crée le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_authors as $index => $author): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td>
                                <?php if (empty($author['photo'])): ?>
                                    <img src="../uploads/autor.png" alt="Aucune photo" width="50" height="50" class="rounded-circle">
                                <?php else: ?>
                                    <img src="../uploads/<?= htmlspecialchars($author['photo']) ?>" 
                                        alt="Photo de <?= htmlspecialchars($author['first_name'] . ' ' . $author['last_name']) ?>" 
                                        width="50" height="50" class="rounded-circle">
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($author['first_name'] . ' ' . $author['last_name']) ?></td>
                            <td> <?= htmlspecialchars($author['email']) ?></td>
                            <td><?= htmlspecialchars($author['nationality']) ?></td>
                            <td><?= htmlspecialchars($author['phone_number']) ?></td>
                            <td><?= date('d/m/Y', strtotime($author['created_at'])) ?></td>
                            <td class="d-flex align-items-center justify-content-center">
                                <a href="edit_author.php?id=<?= $author['id']?>" class="btn shadow-none btn-warning py-2 px-2 mx-2 rounded-0">
                                    <i class="fas fa-pencil-alt"></i> &nbsp; Modifier
                                </a>

                                <a href="delete_author.php?id=<?= $author['id']?>" class="btn shadow-none btn-danger py-2 px-2 mx-2 rounded-0">
                                    <i class="fas fa-trash-alt"></i> &nbsp; Modifier
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