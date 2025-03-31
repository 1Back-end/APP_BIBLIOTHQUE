<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

</head>

<body>

<style>
    .card-box {
    background-color: #fff;
    border-radius: 10px;
    -webkit-box-shadow: 0 0 28px rgba(0,0,0,.08);
    box-shadow: 0 0 28px rgba(0,0,0,.08);
  }
  small{
    font-size: 10px;
}
.iti__country-list {
  position: absolute;
  z-index: 2;
  list-style: none;
  text-align: left;
  padding: 0;
  margin: 0 0 0 -1px;
  box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
  background-color: white;
  border: 1px solid #CCC;
  white-space: nowrap;
  max-height: 200px;
  overflow-y: scroll;
  -webkit-overflow-scrolling: touch;
  width: 385px;
}
.iti__selected-dial-code {
        display: none;
    }
.iti {
    width: 100% !important; /* Forcer la largeur à 100 % */
    max-width: 100%; /* Empêche la restriction de largeur */
}

.iti__flag-container {
    background-color: #f8f9fa; /* Optionnel */
}
.iti {
    width: 100% !important; /* Forcer la largeur à 100 % */
    max-width: 100%; /* Empêche la restriction de largeur */
}

.iti__flag-container {
    background-color: #f8f9fa; /* Optionnel */
}
</style>
    
<?php include ("process_create_users.php")?>
	<section class="h-100">
		<div class="container h-100 pb-5 mt-5">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<!-- <div class="text-center my-1">
						<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR747gBca1nrACYantWVCl-fWANdiFxdBrrj6D7x1-jgzIqHfqiUcwADJWGbjZmIhMgC_8&usqp=CAU" alt="logo" width="100">
					</div> -->
                    <?php if (!empty($erreur)): ?>
                        <div class="alert alert-danger text-center"><?= htmlspecialchars($erreur); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success text-center"><?= htmlspecialchars($success); ?></div>
                    <?php endif; ?> 

					<div class="card shadow-sm border-0">
						<div class="card-body p-3">
							<h1 class="fs-4 card-title fw-bold mb-4">Créer votre compte</h1>
							<form  method="POST" class="needs-validation" novalidate >
								<div class="mb-3">
									<label class="mb-2" for="name">Nom <span class="text-danger">*</span></label>
									<input id="name" type="text" class="form-control form-control-lg" required name="name">
									<div class="invalid-feedback">
										Ce champ est requis !
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2" for="email">Email <span class="text-danger">*</span></label>
									<input id="email" type="email" class="form-control form-control-lg" required name="email">
                                    <div class="invalid-feedback">
										Ce champ est requis !
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2" for="phone">Numéro de téléphone <span class="text-danger">*</span></label>
									<input type="tel" class="form-control form-control-lg" id="phone" required name="phone_number">
									<div class="invalid-feedback">
										Ce champ est requis !
									</div>
								</div>


                                <div class="mb-3">
									<label class="mb-2" for="phone">Adresse <span class="text-danger">*</span></label>
									<input type="text" class="form-control form-control-lg" id="address" required name="address">
									<div class="invalid-feedback">
										Ce champ est requis !
									</div>
								</div>
								<div class="mb-3">
									<label class="mb-2" for="password">Mot de passe <span class="text-danger">*</span></label>
									<input id="password" type="password" class="form-control  form-control-lg" required name="password">
                                    <div class="invalid-feedback">
										Ce champ est requis !
									</div>
								</div>
                                <div class="mb-3">
									<label class="mb-2" for="password">Confirmer votre mot de passe <span class="text-danger">*</span></label>
									<input id="password" type="password" class="form-control form-control-lg" required name="confirm_password">  
                                    <div class="invalid-feedback">
										Ce champ est requis !
									</div>
								</div>

								<div class="d-flex align-items-center justify-content-between">
									<div class="mr-auto">
									<button type="submit" name="submit" class="btn btn-primary py-3 ps-2 ms-auto shadow-none">
										Créer
									</button>
									</div>
									<div class="ml-auto">
									<a href="../index.php" class="btn btn-secondary shadow-none py-3 ps-3">
                                        Retour à l'acceuil
                                    </a>

									</div>
                           
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Vous avez déjà un compte ? <a href="login.php" class="text-primary text-decoration-none">Connectez-vous</a>
                        </div>

						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>


<script>
 const phoneInput = document.querySelector("#phone");
const errorMessage = document.querySelector(".invalid-feedback");

// Initialisation avec détection automatique du pays
const iti = intlTelInput(phoneInput, {
    initialCountry: "auto",
    geoIpLookup: function(callback) {
        fetch("https://ipapi.co/json")
            .then(res => res.json())
            .then(data => callback(data.country_code))
            .catch(() => callback("us"));
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
    separateDialCode: false, // Le code pays fait partie du numéro
    nationalMode: false, // Force le format international
    autoFormat: true, // Formatage automatique
    // customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
    //     return "Ex: " + selectedCountryData.dialCode + " " + selectedCountryPlaceholder;
    // }
});

// Formatage automatique lors de la saisie
phoneInput.addEventListener('input', function() {
    // Formatage automatique géré par la librairie
    const numberType = intlTelInputUtils.numberFormat.INTERNATIONAL;
    const formattedNumber = iti.getNumber(numberType);
    
    if (formattedNumber) {
        phoneInput.value = formattedNumber;
    }
    
    validatePhoneNumber();
});

// Validation du numéro
function validatePhoneNumber() {
    const isValid = iti.isValidNumber();
    const currentNumber = iti.getNumber(intlTelInputUtils.numberFormat.E164);
    
    if (isValid) {
        phoneInput.classList.remove("is-invalid");
        phoneInput.classList.add("is-valid");
        errorMessage.textContent = "";
    } else {
        phoneInput.classList.remove("is-valid");
        phoneInput.classList.add("is-invalid");
        errorMessage.textContent = currentNumber ? "Numéro invalide" : "Ce champ est requis";
    }
    
    return isValid;
}

// Ajout automatique du code pays si manquant
phoneInput.addEventListener('blur', function() {
    if (!phoneInput.value.startsWith('+') && phoneInput.value) {
        const countryData = iti.getSelectedCountryData();
        phoneInput.value = `+${countryData.dialCode} ${phoneInput.value}`;
        validatePhoneNumber();
    }
});

// Validation avant soumission
phoneInput.form?.addEventListener('submit', function(e) {
    if (!validatePhoneNumber()) {
        e.preventDefault();
        phoneInput.focus();
    }
});

// Mise à jour lors du changement de pays
phoneInput.addEventListener('countrychange', function() {
    const number = iti.getNumber(intlTelInputUtils.numberFormat.E164);
    if (number) {
        phoneInput.value = iti.getNumber(intlTelInputUtils.numberFormat.INTERNATIONAL);
    }
    validatePhoneNumber();
});
</script>
	<script src="script.js"></script>
</body>
</html>