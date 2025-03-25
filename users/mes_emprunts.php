<?php include("menu.php"); ?>
<?php include("fonction.php"); ?>
<div class="container-fluid pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="card shadow-sm p-3 border-0">
            <h3 class="h3 mb-0 text-gray-800 text-uppercase fw-bold text-center">Mes livres empruntés</h3>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 mb-3">
    <div class="card shadow-sm p-3 border-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Livre</th>
                        <th>Catégorie</th>
                        <th>Auteur</th>
                        <th>Date emprunt</th>
                        <th>Date retour prévue</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($emprunts as $index => $emprunt): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td>
                                <!-- <img src="../uploads/<?= htmlspecialchars($emprunt['photo_livre']) ?>" alt="Image du livre" width="50"> -->
                                <?= htmlspecialchars($emprunt['livre']) ?>
                            </td>

                            <td><?= htmlspecialchars(strtoupper($emprunt['categories'])) ?></td>
                            <td><?= htmlspecialchars($emprunt['first_name'] . ' ' . $emprunt['last_name']) ?></td>

                            <td>
                                <?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunt['date_emprunt']))) ?>
                            </td>
                            <td>
                                <?= $emprunt['date_retour_estimee'] ? htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunt['date_retour_estimee']))) : 'Non retourné' ?>
                            </td>
                            

                            <td>
                                <?php if ($emprunt['status'] == 'en cours') : ?>
                                    <span class="badge bg-warning py-2 ps-2 shadow-none text-white">En cours</span>
                                <?php elseif ($emprunt['status'] == 'approuvé') : ?>
                                    <span class="badge bg-success py-2 ps-2 shadow-none text-white">Approuvé</span>
                                <?php elseif ($emprunt['status'] == 'rejetté') : ?>
                                    <span class="badge bg-danger py-2 ps-2 shadow-none text-white">Rejetté</span>
                                <?php elseif ($emprunt['status'] == 'terminé') : ?>
                                    <span class="badge bg-success py-2 ps-2 shadow-none text-white">Terminé</span>
                                <?php endif; ?>
                            </td>
                            <td class="d-flex align-items-center justify-content-between">
                                <a href="details_emprunt.php?id=<?= $emprunt['id']?>" class="btn shadow-none btn-info py-2 px-2 btn-sm mx-2 rounded-0">
                                    <i class="fas fa-undo-alt"></i> &nbsp; Retournée
                                </a>

                                <a href="details_emprunt.php?id=<?= $emprunt['id']?>" class="btn shadow-none btn-info py-2 px-2 btn-sm mx-2 rounded-0">
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
