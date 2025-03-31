<?php include_once('../include/menu.php');?>
<?php include_once('../controllers/request.php');?>

<div class="container-fluid mt-3 pb-5">
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="card shadow-none border-0 p-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="mr-auto">
                    <h5 class="text-uppercase">Liste des utilisateurs</h5>
                </div>
                <div class="ml-auto">
                    <a href="ajouter_utilisateur.php" class="btn btn-primary ps-2 py-2 shadow-none border-0 text-white text-uppercase">
                        Ajouter
                    </a>
                </div>
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
            <div class="card shadow-none p-3 border-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <th>ID</th>
                    <th>Nom Complet</th>
                    <th>Adresse</th>
                    <th>Contact</th>
                    <th>Statut</th>
                    <th>Ajouté le</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php foreach ($all_users as $index => $user):?>
                           <tr>
                            <td><?php echo $user['admin_uuid'];?></td>
                           <td class="text-nowrap" style="max-width: 205px; overflow: hidden;">
                                <div class="d-flex align-items-center">
                                    <?php if (!empty($user['photo'])) : ?>
                                    <img src="../uploads/<?= $user['photo'] ?>" class='rounded-circle img-fluid me-2' width='40' height='40' style='object-fit: cover; width: 40px; height: 40px; max-width: 40px; max-height: 40px;'>
                                    <?php else : ?>
                                        <img src="../uploads/profile.jpeg" class='rounded-circle img-fluid me-2' width='40' height='40' style='object-fit: cover; width: 40px; height: 40px; max-width: 40px; max-height: 40px;'>
                                    <?php endif; ?>
                                    <div class="ms-3">
                                    <span class="mx-2 text-truncate" style="max-width: calc(100% - 50px);"><?= htmlspecialchars($user["username"]) ?></span>
                                </div>
                                </div>
                            </td>
                            <!-- <td><?= htmlspecialchars($user["email"]) ?></td> -->
                            <td><?= htmlspecialchars($user["address"]) ?></td>
                            <td><?= htmlspecialchars($user["phone_number"])?></td>
                            <td>
                                <?php if ($user["is_active"] == 1):?>
                                    <span class="disabled btn btn-success btn-sm btn-xs text-white btn-rounded">Actif</span>
                                <?php else:?>
                                    <span class="disabled btn btn-danger btn-sm btn-xs text-white btn-rounded">Inactif</span>
                                <?php endif;?>

                            </td>
                            <td><?= date('d-m-Y H:i:s',strtotime(htmlspecialchars($user['created_at']))) ?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <!-- Supprimer -->
                                    <a href="process_delete_user.php?user_uuid=<?= htmlspecialchars($user['admin_uuid']) ?>" 
                                    class="btn btn-xs btn-sm py-2 px-2 rounded-0 shadow-none btn-danger mx-2">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </a>

                                    <?php if ($user['is_active'] == 1): ?>
                                        <!-- Désactiver -->
                                        <a href="process_update_deactivate_user.php?admin_uuid=<?= htmlspecialchars($user['admin_uuid']) ?>" 
                                        class="btn-info py-2 px-2 rounded-0 shadow-none btn-xs text-decoration-none btn-sm border-0 mx-2">
                                            <i class="fas fa-toggle-off"></i> Désactiver
                                        </a>
                                    <?php else: ?>
                                        <!-- Activer -->
                                        <a href="process_update_activate_user.php?admin_uuid=<?= htmlspecialchars($user['admin_uuid']) ?>" 
                                        class="btn-success btn-xs btn-sm py-2 px-3 text-decoration-none rounded-0 shadow-none border-0 mx-2">
                                            <i class="fas fa-toggle-on"></i> Activer
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>

                           </tr>
                      <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>