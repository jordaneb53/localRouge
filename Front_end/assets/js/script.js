
function updateValue(id, value) {
    document.getElementById(id).textContent = value;
}

// Burger menu
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
document.getElementById('loginForm').addEventListener('submit', connect);
document.getElementById('btnLogin').addEventListener('click', connect);

// Récupère les paramètres 'id' et 'titre' dans l'URL
const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const titre = urlParams.get('titre');
const duree = urlParams.get('dure');


document.addEventListener("DOMContentLoaded", () => {
    const marqueSelect = document.getElementById("marqueSelect");
    const modeleSelect = document.getElementById("modeleSelect");
    const openModalButton = document.getElementById("openModalVehicule");
    const modalVehicule = document.getElementById("modalVehicule");
    const closeBtn = document.querySelector(".closeVehicule");

    // Gestion de la modale
    if (openModalButton) {
        openModalButton.addEventListener("click", () => {
            modalVehicule.style.display = "block";
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            modalVehicule.style.display = "none";
        });
    }

    window.addEventListener("click", (event) => {
        if (event.target === modalVehicule) {
            modalVehicule.style.display = "none";
        }
    });

    // Fonction pour vider les options d'un select
    function clearOptions(select) {
        select.innerHTML = "";
        let option = document.createElement('option');
        option.value = "";
        option.textContent = "Sélectionnez d'abord une option";
        select.appendChild(option);
    }
});
document.addEventListener("DOMContentLoaded", function () {
    const dateInputs = document.querySelectorAll('.date-input');

    dateInputs.forEach(input => {
        input.addEventListener('input', function () {
            const date = new Date(this.value);
            const day = date.getUTCDay(); // 0 = dimanche, 6 = samedi

            if (day === 0 || day === 6) {
                alert("Les week-ends ne sont pas disponibles pour les rendez-vous.");
                this.value = '';
            }
        });
    });
});

if (document.querySelector('.closebtncross')) {
    document.querySelector('.closebtncross').addEventListener('click', () => {
        document.getElementById('modalVehicule').style.display = 'none';
    });
}


document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modalRdv");
    const closeModal = document.querySelector(".close");

    // Ouvre la modal quand on clique sur un bouton "Prendre un rendez-vous"
    document.querySelectorAll(".card").forEach(card => {
        const button = card.querySelector("button:not(.connecsession)");
        if (button) {
            button.addEventListener("click", () => {
                const idOperation = card.getAttribute("data-id-operation");
                const nomOperation = card.querySelector("h2").textContent.trim();
                const dateInput = document.getElementById(`date_reservation_${idOperation}`);
                const timeInput = document.getElementById(`heure_reservation_${idOperation}`);
                // const idvehicules = getElementById('Id_vehicule').getAttribute('value');
                const date = dateInput.value;
                const heure = timeInput.value;

                if (!date || !heure) {
                    alert("Veuillez sélectionner une date et une heure.");
                    return;
                }

                // Champs visibles
                document.getElementById("typeReparation").value = nomOperation;
                document.getElementById("dateRdv").value = date;
                document.getElementById("horaireRdv").value = heure;

                // Champs cachés à qui seront  envoyer au backend
                document.getElementById("Id_operations").value = idOperation;
                document.getElementById("date_debut").value = date;
                document.getElementById("heure_debut").value = heure;
                // document.getElementById("Id_vehicule").value = idvehicules;

                // Affiche la modale
                document.getElementById("modalRdv").style.display = "block";
            });
        }
    });


    // Fermer la modal
    if (closeModal) {
        closeModal.addEventListener("click", () => {
            modal.style.display = "none";
        });
    }


    // Clic hors de la modal
    window.addEventListener("click", e => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
});
const vehicule = document.body.dataset.vehicule;

if (vehicule) {
    document.getElementById("vehiculeClient").value = vehicule;
}
// Récupère les infos véhicule du client connecté
fetch('actions/get_vehicule.php')
    .then(response => {
        if (!response.ok) throw new Error("Erreur HTTP : " + response.status);
        return response.json();
    })
    .then(data => {
        if (data.error) {
            document.getElementById('vehiculeClient').value = data.error;
            return;
        }

        let infosVehicule = `${data.marque_vehicules} ${data.modele_vehicules}`;
        if (data.immatriculation) infosVehicule += ` - ${data.immatriculation}`;
        if (data.annee) infosVehicule += ` (${data.annee})`;

        document.getElementById('vehiculeClient').value = infosVehicule;
    })
    .catch(error => {
        console.error("Erreur JS ou réseau :", error);
        document.getElementById('vehiculeClient').value = "Erreur lors du chargement";
    });



