
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
