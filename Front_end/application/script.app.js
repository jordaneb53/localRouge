

// Nettoyer les erreurs existantes
document.querySelectorAll(".error").forEach(function (divError) {
    divError.classList.remove("error");
    let errorDiv = divError.querySelector(".error-message");
    if (errorDiv) divError.removeChild(errorDiv);
});

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

if (allValid) {
    // Soumettre le formulaire ou autres actions
    console.log("Formulaire valide");
} else {
    console.log("Des erreurs sont présentes");
}


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
window.addEventListener('DOMContentLoaded', (event) => {
    // Sélectionne tous les boutons "toggle-password"
    const toggleIcons = document.querySelectorAll('.toggle-password');

    toggleIcons.forEach(icon => {
        icon.addEventListener('click', function () {
            // Trouver l'input associé (précédent frère dans le DOM)
            const passwordInput = this.previousElementSibling;

            if (passwordInput && passwordInput.type === "password") {
                passwordInput.type = "text";
                this.textContent = "👁‍🗨"; // Icône œil ouvert
            } else {
                passwordInput.type = "password";
                this.textContent = "👁"; // Icône œil fermé
            }
        });
    });
});





