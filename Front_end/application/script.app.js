document.addEventListener('DOMContentLoaded', function () {
    // Nettoyer les erreurs existantes au chargement de la page
    document.querySelectorAll(".error").forEach(function (divError) {
        divError.classList.remove("error");
        let errorDiv = divError.querySelector(".error-message");
        if (errorDiv) divError.removeChild(errorDiv);
    });

    const form = document.querySelector('.login-form');

    form.addEventListener('submit', function (event) {
        let allValid = true;

        // Vérification des champs obligatoires
        document.querySelectorAll("input[required]").forEach(function (input) {
            if (input.value.trim() === "") {
                afficherErreur(input, "Ce champ est obligatoire.");
                input.setCustomValidity("Ce champ est obligatoire.");  // Désactive la validation HTML native
                allValid = false;
            } else {
                input.setCustomValidity("");  // Réactive la validation native si valide
            }
        });

        if (!allValid) {
            event.preventDefault(); // Empêche la soumission si des erreurs sont présentes
            console.log("Des erreurs sont présentes");
        } else {
            console.log("Formulaire valide");
        }
    });

    document.querySelector('.toggle-password1').addEventListener('click', togglePasswordVisibility);
});

// Fonction pour afficher une erreur
function afficherErreur(element, message) {
    let parentDiv = element.closest("div");
    if (parentDiv && !parentDiv.classList.contains("error")) {
        parentDiv.classList.add("error");
        let errorDiv = document.createElement("div");
        errorDiv.classList.add("error-message");
        errorDiv.innerText = message;
        parentDiv.appendChild(errorDiv);
    }
}

function togglePasswordVisibility() {
    var passwordField = document.getElementById('loginPassword');
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const navItems = document.querySelectorAll('.nav-bar li');
    const sections = document.querySelectorAll('.content-section');

    navItems.forEach(item => {
        item.addEventListener('click', function () {
            // Masquer toutes les sections
            sections.forEach(section => {
                section.classList.remove('active');
            });

            // Afficher la section correspondante
            const targetSection = document.getElementById(item.getAttribute('data-section'));
            if (targetSection) {
                targetSection.classList.add('active');
            }
        });
    });
});




