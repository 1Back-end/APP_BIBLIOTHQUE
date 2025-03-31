<?php include("../include/menu.php"); ?>
<?php include("../controllers/request.php");?>

<div class="container-fluid pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="card shadow-sm p-3 border-0">
            <h3 class="h3 mb-0 text-gray-800 text-uppercase fw-bold text-center">Listes des retours</h3>
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
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Livre</th>
                        <th>Utilisateur</th>
                        <th>Date emprunt</th>
                        <th>Date retour réelle</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($retours as $index => $retour): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td>
                                <!-- <img src="../uploads/<?= htmlspecialchars($retour['photo_livre']) ?>" alt="Image du livre" width="50"> -->
                                <?= htmlspecialchars($retour['livre']) ?>
                            </td>

                            <td><?= htmlspecialchars(strtoupper($retour['utilisateur'])) ?></td>

                            <td>
                                <?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($retour['date_emprunt']))) ?>
                            </td>
                            
                            <td>
                                <?= $retour['date_retour_reel'] ? htmlspecialchars(date('d/m/Y H:i:s', strtotime($retour['date_retour_reel']))) : 'Non retourné' ?>
                            </td>

                            <td>
                                <?php if ($retour['status'] == 'retournée') : ?>
                                    <span class="badge bg-primary py-2 ps-2 shadow-none text-white">Retournée</span>
                                <?php endif; ?>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
