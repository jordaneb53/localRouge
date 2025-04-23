
function updateValue(id, value) {
    document.getElementById(id).textContent = value;
}
// Écoute les changements de sliders
document.addEventListener("DOMContentLoaded", () => {
    const kmSlider = document.getElementById("kilometrage");
    const prixSlider = document.getElementById("prix");

    const cards = document.querySelectorAll(".card");

    function filterCards() {
        const maxKm = parseInt(kmSlider.value, 10);
        const maxPrix = parseInt(prixSlider.value, 10);

        cards.forEach(card => {
            const cardKm = parseInt(card.getAttribute("data-km"), 10);
            const cardPrix = parseInt(card.getAttribute("data-prix"), 10);

            if (cardKm <= maxKm && cardPrix <= maxPrix) {
                card.style.visibility = "visible";
                card.style.position = "static";
                card.style.pointerEvents = "auto";
            } else {
                card.style.visibility = "hidden";
                card.style.position = "absolute";
                card.style.pointerEvents = "none";
            }
        });
    }

    kmSlider.addEventListener("input", filterCards);
    prixSlider.addEventListener("input", filterCards);

    // // Appliquer les filtres au chargement initial
    // filterCards();
});

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

// Récupère les paramètres 'id' et 'titre' dans l'URL
const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const titre = urlParams.get('titre');
const duree = urlParams.get('dure');

// Vérifie si les valeurs existent et les stocke dans sessionStorage
if (id && titre) {
    sessionStorage.setItem('idCategorie', id);
    sessionStorage.setItem('titreCategorie', titre);
} else {
    console.error("Les paramètres 'id' et 'titre' sont manquants dans l'URL.");
}

document.addEventListener("DOMContentLoaded", () => {
    // Récupérer la modale et les éléments nécessaires
    let modalVehicule = document.getElementById("modalVehicule");
    const detailButtons = document.querySelectorAll(".btn-open-modal");
    const modalImg = document.getElementById("modal-img");
    const modalTitre = document.getElementById("modal-marque-model");
    const modalDescription = document.getElementById("modal-description");
    const modalKm = document.getElementById("modal-km");
    const modalPrix = document.getElementById("modal-prix");
    const modalHistorique = document.getElementById("modal-historique");
    const modalEtat = document.getElementById("modal-etat");
    const modalDate = document.getElementById("modal-date");
    const closeBtn = document.querySelector(".closeVehicule");
    const prevBtn = document.getElementById("prevImage");
    const nextBtn = document.getElementById("nextImage");

    // Créer un tableau pour les images
    let images = [];
    let currentIndex = 0;

    // Vérifier que la modale et les boutons existent
    if (modalVehicule && closeBtn) {
        // Ajouter les événements aux boutons "Voir le détail"
        detailButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                const marque = btn.getAttribute("data-marque");
                const model = btn.getAttribute("data-model");

                // Récupérer les images depuis l'attribut data-images (séparées par une virgule)
                const imagesData = btn.getAttribute("data-images").split(","); // Diviser la chaîne en tableau

                // Mettre à jour les informations dans la modale
                images = imagesData; // Stocker les images dans le tableau
                currentIndex = 0; // Réinitialiser l'index à 0 (la première image)
                modalImg.src = images[currentIndex]; // Afficher la première image
                modalTitre.textContent = `${marque} ${model}`;
                modalDescription.textContent = btn.getAttribute("data-titre");
                modalKm.textContent = `Kilométrage : ${btn.getAttribute("data-km")}`;
                modalPrix.textContent = `Prix : ${btn.getAttribute("data-prix")}`;
                modalHistorique.textContent = `Historique : ${btn.getAttribute("data-historique")}`;
                modalEtat.textContent = `État : ${btn.getAttribute("data-etat")}`;
                modalDate.textContent = btn.getAttribute("data-date")
                    ? `Date d'achat : ${btn.getAttribute("data-date")}`
                    : '';

                // Afficher la modale
                modalVehicule.style.display = "block";
            });
        });

        // Fermer la modale quand on clique sur le bouton de fermeture
        closeBtn.addEventListener("click", () => {
            modalVehicule.style.display = "none";
        });

        // Fermer la modale si on clique à l'extérieur de celle-ci
        window.addEventListener("click", (e) => {
            if (e.target == modalVehicule) {
                modalVehicule.style.display = "none";
            }
        });

        // Gérer la navigation des images avec les flèches
        prevBtn.addEventListener("click", () => {
            if (currentIndex > 0) {
                currentIndex--;
                modalImg.src = images[currentIndex];
            }
        });

        nextBtn.addEventListener("click", () => {
            if (currentIndex < images.length - 1) {
                currentIndex++;
                modalImg.src = images[currentIndex];
            }
        });
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const marqueSelect = document.getElementById("marqueSelect");
    const modeleSelect = document.getElementById("modeleSelect");
    const motorisationSelect = document.getElementById("motorisationSelect");
    const openModalButton = document.getElementById("openModalVehicule");
    const modalVehicule = document.getElementById("modalVehicule");
    const closeBtn = document.querySelector(".closeVehicule");

    // Charger dynamiquement les marques au chargement
    fetch('actions/ajax/get_marques.php')
        .then(response => response.json())
        .then(data => {
            marqueSelect.innerHTML = '<option value="">Sélectionnez une marque</option>';
            data.forEach(marque => {
                let option = document.createElement('option');
                option.value = marque.id_marques;  // Utilisation de l'ID de la marque
                option.textContent = marque.nom_marques;
                marqueSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des marques :', error);
        });

    // Charger les modèles en fonction de la marque (utilisation de l'ID de la marque)
    marqueSelect.addEventListener("change", () => {
        const marqueId = marqueSelect.value;  // Utilisation de l'ID de la marque
        if (marqueId) {
            fetchModels(marqueId);  // Passer l'ID de la marque à la fonction
        } else {
            clearOptions(modeleSelect);
            clearOptions(motorisationSelect);
        }
    });

    // Charger les motorisations en fonction du modèle (utilisation des IDs)
    modeleSelect.addEventListener("change", () => {
        const modeleId = modeleSelect.value;
        console.log("→ Envoi vers PHP id_modeles =", modeleId);
        if (modeleId) fetchMotorisations(modeleId);
    });



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

    // Fonction pour récupérer les modèles en fonction de l'ID de la marque
    function fetchModels(marqueId) {
        fetch('actions/ajax/get_modeles.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id_marques=${encodeURIComponent(marqueId)}`  // Passer l'ID de la marque
        })
            .then(response => response.json())
            .then(models => {
                clearOptions(modeleSelect);
                if (models.length > 0) {
                    models.forEach(model => {
                        let option = document.createElement('option');
                        option.value = model.id_modeles;  // Utilisation de l'ID du modèle
                        option.textContent = model.nom_modele;
                        modeleSelect.appendChild(option);
                    });
                } else {
                    let option = document.createElement('option');
                    option.textContent = "Aucun modèle trouvé";
                    modeleSelect.appendChild(option);
                }
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des modèles:', error);
            });
    }

    // Fonction pour récupérer les motorisations en fonction de l'ID du modèle
    function fetchMotorisations(modeleId) {
        fetch('actions/ajax/get_motorisations.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id_modeles=${encodeURIComponent(modeleId)}`
        })
            .then(response => response.text())  // Utiliser .text() pour vérifier la réponse brute
            .then(data => {
                console.log("Réponse brute:", data);  // Afficher la réponse brute dans la console pour débogage
                try {
                    const motorisations = JSON.parse(data);  // Tenter de parser la réponse en JSON
                    clearOptions(motorisationSelect);
                    if (motorisations.length > 0) {
                        motorisations.forEach(motorisation => {
                            let option = document.createElement('option');
                            option.value = motorisation.id_motorisation;  // Utilisation de l'ID de la motorisation
                            option.textContent = motorisation.nom_motorisation;
                            motorisationSelect.appendChild(option);
                        });
                    } else {
                        let option = document.createElement('option');
                        option.textContent = "Aucune motorisation trouvée";
                        motorisationSelect.appendChild(option);
                    }
                } catch (error) {
                    console.error('Erreur lors du parsing JSON:', error);  // Afficher l'erreur de parsing
                }
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des motorisations:', error);
            });
    }

    // Fonction pour vider les options d'un select
    function clearOptions(select) {
        select.innerHTML = "";
        let option = document.createElement('option');
        option.value = "";
        option.textContent = "Sélectionnez d'abord une option";
        select.appendChild(option);
    }
});
