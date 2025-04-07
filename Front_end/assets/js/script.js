
function updateValue(id, value) {
    document.getElementById(id).textContent = value;
}
// PAGINATION
let currentPage = 1;
const totalPages = 10; // Nombre total de pages

// Fonction pour générer les boutons des pages
function generatePageButtons() {
    const pageButtonsContainer = document.getElementById("page-buttons");
    pageButtonsContainer.innerHTML = ""; // Réinitialiser les boutons de page

    // Afficher des pages autour de la page courante
    let startPage = Math.max(1, currentPage - 2);
    let endPage = Math.min(totalPages, currentPage + 2);

    for (let i = startPage; i <= endPage; i++) {
        const pageButton = document.createElement("button");
        pageButton.classList.add("page-btn");
        if (i === currentPage) {
            pageButton.classList.add("active");
        }
        pageButton.textContent = i;
        pageButton.onclick = () => goToPage(i);
        pageButtonsContainer.appendChild(pageButton);
    }
}

// Fonction pour changer de page
function changePage(direction) {
    currentPage += direction;
    if (currentPage < 1) currentPage = 1;
    if (currentPage > totalPages) currentPage = totalPages;
    updatePagination();
}

// Aller directement à une page spécifique
// function goToPage(page) {
//     currentPage = page;
//     updatePagination();
// }

// Mise à jour de l'état de la pagination
function updatePagination() {
    generatePageButtons();
    document.getElementById("page-number").textContent = currentPage;
    document.getElementById("prev-btn").disabled = currentPage === 1;
    document.getElementById("next-btn").disabled = currentPage === totalPages;
}

// Initialiser la pagination
// updatePagination();


// Burger menu ouvrir et ferme le menu 

document.getElementById('iconBurger')?.addEventListener('click', function () {
    document.querySelector('.burgerMenu')?.classList.add('active')
})

document.querySelector('.fermerBurger')?.addEventListener('click', function () {
    document.querySelector('.burgerMenu')?.classList.remove('active')
})

// modal mot de passe oublier avec les critere 
document.addEventListener("DOMContentLoaded", function () {
    const passwordCriteriaModal = document.getElementById("passwordCriteriaModal");
    const criteriaToggle = document.getElementById("passwordHelp");
    const closeCriteria = document.getElementById("closeCriteriaModal");

    const newPasswordInput = document.querySelector("input[name='new_password']");

    // Mise à jour des critères en live
    newPasswordInput?.addEventListener("input", function () {
        const pwd = this.value;

        const update = (id, condition, message) => {
            const el = document.getElementById(id);
            el.style.color = condition ? "green" : "red";
            el.innerHTML = (condition ? "✅ " : "❌ ") + message;
        };

        update("crit-length", pwd.length >= 8, "Au moins 8 caractères");
        update("crit-uppercase", /[A-Z]/.test(pwd), "Une lettre majuscule");
        update("crit-lowercase", /[a-z]/.test(pwd), "Une lettre minuscule");
        update("crit-number", /[0-9]/.test(pwd), "Un chiffre");
        update("crit-special", /[#?!@$%^&*-]/.test(pwd), "Un caractère spécial (#?!@$%^&*-)");
    });

    // Affichage / fermeture
    criteriaToggle?.addEventListener("click", () => {
        passwordCriteriaModal.style.display = "block";
    });

    closeCriteria?.addEventListener("click", () => {
        passwordCriteriaModal.style.display = "none";
    });
});


document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("modal");
    let buttonDisplayModal = document.getElementById("displayModal");
    let buttonCloseModal = document.getElementById("closeModal");
    let modalPassword = document.getElementById("passwordModal");
    let passwordHelp = document.getElementById("passwordHelp");
    let closePasswordModal = document.getElementById("closeModal1");

    // Vérification des critères du mot de passe en temps réel
    document.getElementById("mot_de_passe")?.addEventListener("input", function () {
        let password = this.value;

        function updateCriteria(id, condition, message) {
            let element = document.getElementById(id);
            element.style.color = condition ? "green" : "red";
            element.innerHTML = (condition ? "✅ " : "❌ ") + message;
        }

        updateCriteria("length", password.length >= 8, "Au moins 8 caractères");
        updateCriteria("uppercase", /[A-Z]/.test(password), "Une lettre majuscule");
        updateCriteria("lowercase", /[a-z]/.test(password), "Une lettre minuscule");
        updateCriteria("number", /[0-9]/.test(password), "Un chiffre");
        updateCriteria("special", /[#?!@$%^&*-]/.test(password), "Un caractère spécial (#?!@$%^&*-)");
    });

    // Afficher la modale du mot de passe
    passwordHelp?.addEventListener("click", function () {
        modalPassword.style.display = "block";
    });

    // Fermer la modale du mot de passe
    closePasswordModal?.addEventListener("click", function () {
        modalPassword.style.display = "none";
    });

    // Afficher la modale principale
    buttonDisplayModal?.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    // Fermer la modale principale
    buttonCloseModal?.addEventListener("click", function () {
        modal.style.display = "none";
    });

    document.getElementById("form").addEventListener("submit", function (e) {
        e.preventDefault(); // Toujours au début

        let allValid = true;
        console.log(allValid);
        // Nettoyer les anciennes erreurs
        document.querySelectorAll(".error").forEach(function (divError) {
            divError.classList.remove("error");
            let errorDiv = divError.querySelector(".error-message");
            if (errorDiv) divError.removeChild(errorDiv);
        });

        // Vérification des champs requis
        document.querySelectorAll("#form input[required]").forEach(function (input) {
            if (input.value.trim() === "") {
                afficherErreur(input, "Ce champ est obligatoire.");
                allValid = false;
            }
        });
        console.log("champs requis", allValid);
        //  Vérification du numéro de téléphone
        let inputTel = document.getElementById("telephone");
        const tel = inputTel.value.trim();
        const regexTel = /^0[1-9]\d{8}$/;
        if (!regexTel.test(tel)) {
            afficherErreur(inputTel, "Le numéro de téléphone est invalide (format attendu : 0612345678).");
            allValid = false;
        }

        // Vérification email
        let inputMail = document.getElementById("email");
        const email = inputMail.value.trim();
        const regexMail = /^[A-Za-z0-9.\-_+]+@[A-Za-z0-9.\-]+\.[A-Za-z0-9]{2,}$/;
        if (!regexMail.test(email)) {
            afficherErreur(inputMail, "L'adresse mail n'est pas valide.");
            allValid = false;
        }
        console.log("email", allValid);
        // Vérification mot de passe
        let inputPassword = document.getElementById("mot_de_passe");
        const regexPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[#?!@$%^&*-]).{8,}$/;
        if (!regexPassword.test(inputPassword.value)) {
            afficherErreur(inputPassword, "Le mot de passe ne respecte pas les critères.");
            allValid = false;
        }
        console.log("mot de passe", allValid);
        // Vérification de la confirmation du mot de passe
        let confirmPassword = document.getElementById("confirme_mot_de_passe");
        if (confirmPassword.value !== inputPassword.value) {
            afficherErreur(confirmPassword, "Les mots de passe ne correspondent pas.");
            allValid = false;
        }
        console.log("confirmation mot de passe", allValid);
        // Vérification des conditions générales
        let conditions = document.getElementById("accepter_conditions");
        if (!conditions.checked) {
            afficherErreur(conditions, "Vous devez accepter les conditions générales.");
            allValid = false;
        }
        console.log(allValid);
        // Si toutes les validations sont OK, envoyer le formulaire
        if (allValid) {
            document.getElementById("form").submit();
        }
    });


    function afficherErreur(element, message) {
        let parentDiv = element.closest("div");
        if (!parentDiv.classList.contains("error")) {
            parentDiv.classList.add("error");
            let errorDiv = document.createElement("div");
            errorDiv.classList.add("error-message");
            errorDiv.innerText = message;
            parentDiv.appendChild(errorDiv);
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
    let loginModal = document.getElementById("loginModal");
    let openLoginModal = document.getElementById("openLoginModal");
    let closeLoginModal = document.getElementById("closeLoginModal");

    // Vérifie que les éléments existent avant d'ajouter des écouteurs
    if (openLoginModal && loginModal) {
        openLoginModal.addEventListener("click", function () {
            loginModal.style.display = "block";
        });
    }

    let btnSessionverif = document.querySelectorAll('.connecsession');
    btnSessionverif.forEach((e) => {
        e.addEventListener('click', () => {
            if (loginModal) loginModal.style.display = "flex";
        });
    });

    if (closeLoginModal && loginModal) {
        closeLoginModal.addEventListener("click", function () {
            loginModal.style.display = "none";
        });
    }

    // Fermer la modale en cliquant à l'extérieur
    window.addEventListener("click", function (event) {
        if (loginModal && event.target === loginModal) {
            loginModal.style.display = "none";
        }
    });
});





function connect(event) {
    event.preventDefault();
    let email = document.getElementById('loginEmail').value.trim();
    let password = document.getElementById('loginPassword').value.trim();

    if (email !== '' && password !== '') {
        let formData = new FormData();
        formData.append("email", email);
        formData.append("password", password);
        fetch("actions/login.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data['status'] == "success") {
                    console.log("Connexion réussie, rechargement de la page...");
                    window.location.reload();
                } else {
                    let diverror = document.createElement("div");
                    diverror.classList.add("error");
                    diverror.textContent = data['message'];
                    document.getElementById('loginModal').appendChild(diverror);

                }
            });


    }

}
document.getElementById('loginForm')?.addEventListener('submit', connect);
document.getElementById('btnLogin')?.addEventListener('click', connect);


