
// Fonction pour basculer l'affichage du mot de passe
function togglePassword(inputId) {
    let passwordInput = document.getElementById(inputId);
    if (passwordInput) {
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    }
}

// Ajout des écouteurs d'événements aux boutons de toggle
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("toggleLoginPassword")?.addEventListener("click", function () {
        togglePassword("loginPassword");
    });

    document.getElementById("toggleNewPassword")?.addEventListener("click", function () {
        togglePassword("newPassword");
    });

    document.getElementById("toggleConfirmPassword")?.addEventListener("click", function () {
        togglePassword("confirmPassword");
    });

    document.getElementById("toggleNewPasswordInscription")?.addEventListener("click", function () {
        togglePassword("mot_de_passe");
    });

    document.getElementById("toggleConfirmPasswordInscription")?.addEventListener("click", function () {
        togglePassword("confirme_mot_de_passe");
    });
});