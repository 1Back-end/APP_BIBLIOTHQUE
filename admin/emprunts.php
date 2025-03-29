<?php include("../include/menu.php"); ?>
<?php include("../controllers/request.php");?>

<div class="container-fluid pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="card shadow-sm p-3 border-0">
            <h3 class="h3 mb-0 text-gray-800 text-uppercase fw-bold text-center">Listes des emprunts</h3>
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
    <div class="card shadow-sm p-3 border-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Livre</th>
                        <th>Utilisateur</th>
                        <th>Date emprunt</th>
                        <th>Date retour prévue</th>
                        <th>Date retour réelle</th>
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

                            <td><?= htmlspecialchars(strtoupper($emprunt['utilisateur'])) ?></td>

                            <td>
                                <?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunt['date_emprunt']))) ?>
                            </td>
                            <td>
                                <?= $emprunt['date_retour_estimee'] ? htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunt['date_retour_estimee']))) : 'Non retourné' ?>
                            </td>
                            <td>
                                <?= $emprunt['date_retour_reel'] ? htmlspecialchars(date('d/m/Y H:i:s', strtotime($emprunt['date_retour_reel']))) : 'Non retourné' ?>
                            </td>

                            <td>
                                <?php if ($emprunt['status'] == 'en cours') : ?>
                                    <span class="badge bg-warning py-2 ps-2 shadow-none text-white">En cours</span>
                                <?php elseif ($emprunt['status'] == 'approuvé') : ?>
                                    <span class="badge bg-success py-2 ps-2 shadow-none text-white">Approuvé</span>
                                <?php elseif ($emprunt['status'] == 'rejetté') : ?>
                                    <span class="badge bg-danger py-2 ps-2 shadow-none text-white">Rejetté</span>
                                <?php elseif ($emprunt['status'] == 'retournée') : ?>
                                    <span class="badge bg-primary py-2 ps-2 shadow-none text-white">Retournée</span>
                                <?php endif; ?>
                            </td>
                            <td class="d-flex align-items-center justify-content-between">
                                <?php if ($emprunt['status'] != 'approuvé' && $emprunt['status'] != 'rejetté' && $emprunt['status'] != 'retournée') : ?>
                                    <a href="approve_emprunt.php?id=<?= $emprunt['id']?>" class="btn shadow-none btn-success py-2 px-2 btn-sm mx-2 rounded-0">
                                        <i class="fas fa-check-circle"></i> &nbsp; Approuver
                                    </a>
                                    <a href="reject_emprunt.php?id=<?= $emprunt['id']?>" class="btn shadow-none btn-danger py-2 px-2 btn-sm mx-2 rounded-0">
                                        <i class="fas fa-times-circle"></i> &nbsp; Rejeter
                                    </a>
                                <?php endif; ?>
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
