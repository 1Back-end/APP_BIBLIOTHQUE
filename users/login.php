<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php echo strtoupper(ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF']))));?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include ("process_login_users.php")?>
    
	<section class="h-100">
		<div class="container h-100 mt-5 pb-5">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <?php if (!empty($erreur)): ?>
                        <div class="alert alert-danger text-center"><?= htmlspecialchars($erreur); ?></div>
                    <?php endif; ?>
					<div class="card shadow-sm border-0">
						<div class="card-body p-3">
							<h1 class="fs-4 card-title fw-bold mb-4">Se connecter à son compte</h1>
							<form method="POST" class="needs-validation" novalidate>
								<div class="mb-3">
									<label class="mb-2" for="email">Adresse email</label>
									<input id="email" type="email" required class="form-control shadow-none py-2 form-control-lg" name="email">
									<div class="invalid-feedback">
										Ce champ est requis !
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-3 w-100">
                                    <label class="" for="password">Mot de passe</label>
										<a href="forgot_password.php" class="float-end text-decoration-none">
											Mot de passe oublié ?
										</a>
									</div>
									<input id="password" type="password" class="form-control shadow-none py-2 form-control-lg" required name="password">
                                    <div class="invalid-feedback">
										Ce champ est requis !
									</div>
								    
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Se souvenir de moi</label>
									</div>
									<button type="submit" name="submit" class="btn btn-primary ms-auto shadow-none">
										Se connecter
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Vous n'avez pas de compte ? <a href="register.php" class="text-primary text-decoration-none">
                            Créez-en un
                            </a>
                        </div>

						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
	<script src="script.js"></script>
</body>
</html>