<?php include_once('../include/menu.php');?>
<!-- <?php include_once('../fonction/fonction.php');?> -->

<div class="main-container mt-3 pb-5">
<div class="col-md-12 col-sm-12 mb-3">
    <?php include ("process_create_users.php"); ?>  
    <?php if (!empty($erreur)): ?>
    <div id="error-message" class="alert alert-danger text-center" role="alert">
        <?= htmlspecialchars($erreur) ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div id="success-message" class="alert alert-success text-center" role="alert">
        <?= htmlspecialchars($success) ?>
    </div>
<?php endif; ?>

</div>
    <div class="col-md-12 col-sm-12 mb-3">
        <div class="card shadow-sm border-0 p-3">
            <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="">Nom Complet <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg" required name="username" value="<?= (empty($erreur) && !empty($success)) ? '' : (isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '') ?>">
                    <div class="invalid-feedback">
                            Ce champ est requis !
                    </div>
                </div>
                <div class="mb-3">
                    <label for="">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control form-control-lg"  required name="email" value="<?= (empty($erreur) && !empty($success)) ? '' : (isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '') ?>">
                    <div class="invalid-feedback">
                            Ce champ est requis !
                    </div>
                </div>
                <div class="mb-3">
                    <label for="">Adresse <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg" required name="address" value="<?= (empty($erreur) && !empty($success)) ? '' : (isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '') ?>">
                    <div class="invalid-feedback">
                            Ce champ est requis !
                    </div>
                </div>
                <div class="mb-3">
                    <label for="">Numéro de téléphone <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control form-control-lg" required name="phone_number" value="<?= (empty($erreur) && !empty($success)) ? '' : (isset($_POST['phone_number']) ? htmlspecialchars($_POST['phone_number']) : '') ?>">
                    <div class="invalid-feedback">
                            Ce champ est requis !
                    </div>
                </div>
                <div class="mb-3">
                    <label for="">Photo de profil</label>
                    <input type="file" name="photo" class="form-control shadow-none">
                </div>
                <div class="mb-3">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-2">
                            <button name="submit" class="btn btn-customize text-white  border-0 btn-primary py-3 ps-3 shadow-none mb-3 mx-2">
                                Enregistrer
                            </button>
                            <a href="utilisateurs.php" class="btn btn-secondary border-0 btn-secondary py-3 ps-3 shadow-none mb-3">Retour à la liste des utilisateurs</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>