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

document.getElementById('iconBurger').addEventListener('click', function () {
    document.querySelector('.burgerMenu').classList.add('active')
})

document.querySelector('.fermerBurger').addEventListener('click', function () {
    document.querySelector('.burgerMenu').classList.remove('active')
})

// planning interractif

document.addEventListener('DOMContentLoaded', () => {
    let currentDate = new Date();
    const scheduleContainer = document.getElementById('scheduleContainer');
    const currentWeekElement = document.getElementById('currentWeek');

    // Plages horaires disponibles
    const availableHours = [
        { start: 8, end: 10 },
        { start: 13, end: 15 },
        { start: 16, end: 18 }
    ];

    const updateCalendar = () => {
        // Calculer le lundi de la semaine actuelle
        const startOfWeek = new Date(currentDate);
        startOfWeek.setDate(currentDate.getDate() - currentDate.getDay() + 1);

        // Mettre à jour l'affichage de la semaine actuelle
        const endOfWeek = new Date(startOfWeek);
        endOfWeek.setDate(startOfWeek.getDate() + 4);
        currentWeekElement.textContent = `Semaine du ${formatDate(startOfWeek)} au ${formatDate(endOfWeek)}`;

        // Mettre à jour le planning
        scheduleContainer.innerHTML = '';
        for (let i = 0; i < 5; i++) {
            const day = new Date(startOfWeek);
            day.setDate(startOfWeek.getDate() + i);

            const daySchedule = document.createElement('div');
            daySchedule.classList.add('day-schedule');

            const dayHeader = document.createElement('div');
            dayHeader.classList.add('day-header');
            dayHeader.textContent = day.toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long' });
            daySchedule.appendChild(dayHeader);

            const hoursContainer = document.createElement('div');
            hoursContainer.classList.add('hours');

            availableHours.forEach(hourRange => {
                for (let hour = hourRange.start; hour < hourRange.end; hour++) {
                    const hourElement = document.createElement('div');
                    hourElement.classList.add('hour');
                    hourElement.textContent = `${hour}:00 - ${hour + 1}:00`;
                    hourElement.addEventListener('click', () => {
                        alert(`Réservation pour ${dayHeader.textContent} de ${hour}:00 à ${hour + 1}:00`);
                    });
                    hoursContainer.appendChild(hourElement);
                }
            });

            daySchedule.appendChild(hoursContainer);
            scheduleContainer.appendChild(daySchedule);
        }
    };

    const formatDate = (date) => {
        return date.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long' });
    };

    document.getElementById('prevWeek').addEventListener('click', () => {
        currentDate.setDate(currentDate.getDate() - 7);
        updateCalendar();
    });

    document.getElementById('nextWeek').addEventListener('click', () => {
        currentDate.setDate(currentDate.getDate() + 7);
        updateCalendar();
    });

    updateCalendar();
});

// planning interractif garage solidaire

document.addEventListener('DOMContentLoaded', () => {
    let currentDate = new Date();
    const scheduleContainer = document.getElementById('scheduleContainer');
    const currentWeekElement = document.getElementById('currentWeek');

    // Plages horaires disponibles
    const availableHours = [
        { start: 8, end: 10 },
        { start: 13, end: 15 },
        { start: 16, end: 18 }
    ];

    const updateCalendar = () => {
        // Calculer le lundi de la semaine actuelle
        const startOfWeek = new Date(currentDate);
        startOfWeek.setDate(currentDate.getDate() - currentDate.getDay() + 1);

        // Mettre à jour l'affichage de la semaine actuelle
        const endOfWeek = new Date(startOfWeek);
        endOfWeek.setDate(startOfWeek.getDate() + 4);
        currentWeekElement.textContent = `Semaine du ${formatDate(startOfWeek)} au ${formatDate(endOfWeek)}`;

        // Mettre à jour le planning
        scheduleContainer.innerHTML = '';
        for (let i = 0; i < 5; i++) {
            const day = new Date(startOfWeek);
            day.setDate(startOfWeek.getDate() + i);

            const daySchedule = document.createElement('div');
            daySchedule.classList.add('day-schedule');

            const dayHeader = document.createElement('div');
            dayHeader.classList.add('day-header');
            dayHeader.textContent = day.toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long' });
            daySchedule.appendChild(dayHeader);

            const hoursContainer = document.createElement('div');
            hoursContainer.classList.add('hoursSolidaire');

            availableHours.forEach(hourRange => {
                for (let hour = hourRange.start; hour < hourRange.end; hour++) {
                    const hourElement = document.createElement('div');
                    hourElement.classList.add('hourSolidaire');
                    hourElement.textContent = `${hour}:00 - ${hour + 1}:00`;
                    hourElement.addEventListener('click', () => {
                        alert(`Réservation pour ${dayHeader.textContent} de ${hour}:00 à ${hour + 1}:00`);
                    });
                    hoursContainer.appendChild(hourElement);
                }
            });

            daySchedule.appendChild(hoursContainer);
            scheduleContainer.appendChild(daySchedule);
        }
    };

    const formatDate = (date) => {
        return date.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long' });
    };

    document.getElementById('prevWeekSolidaire').addEventListener('click', () => {
        currentDate.setDate(currentDate.getDate() - 7);
        updateCalendar();
    });

    document.getElementById('nextWeekSolidaire').addEventListener('click', () => {
        currentDate.setDate(currentDate.getDate() + 7);
        updateCalendar();
    });

    updateCalendar();
});

document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("modal");
    let buttonDisplayModal = document.getElementById("displayModal");
    let buttonCloseModal = document.getElementById("closeModal");
    let modalPassword = document.getElementById("passwordModal");
    let passwordHelp = document.getElementById("passwordHelp");
    let closePasswordModal = document.getElementById("closeModal1");

    // Vérification des critères du mot de passe en temps réel
    document.getElementById("mot_de_passe").addEventListener("input", function () {
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
    passwordHelp.addEventListener("click", function () {
        modalPassword.style.display = "block";
    });

    // Fermer la modale du mot de passe
    closePasswordModal.addEventListener("click", function () {
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

    // Validation du formulaire
    document.getElementById("form").addEventListener("submit", function (e) {
        e.preventDefault(); // Empêcher l'envoi par défaut
        let allValid = true;

        // Nettoyer les erreurs existantes
        document.querySelectorAll(".error").forEach(function (divError) {
            divError.classList.remove("error");
            let errorDiv = divError.querySelector(".error-message");
            if (errorDiv) divError.removeChild(errorDiv);
        });

        // Vérification des champs obligatoires
        document.querySelectorAll("input[required], textarea[required], select[required]").forEach(function (input) {
            if (input.value.trim() === "") {
                afficherErreur(input, "Ce champ est obligatoire.");
                allValid = false;
            }
        });

        // Vérification des champs requis (email, adresse, ville, code postal)
        let requiredFields = ["email", "adresse", "ville", "codePostale"];
        requiredFields.forEach(function (id) {
            let input = document.getElementById(id);
            if (input.value.trim() === "") {
                afficherErreur(input, "Ce champ est obligatoire.");
                allValid = false;
            }
        });

        // Vérification du format de l'email
        let inputMail = document.getElementById("email");
        const regexMail = /^[A-Za-z0-9.\-_+]+@[A-Za-z0-9.\-]+\.[A-Za-z0-9]{2,}$/;
        if (!regexMail.test(inputMail.value.trim())) {
            afficherErreur(inputMail, "L'adresse mail n'est pas valide (ex: exemple@domaine.com)");
            allValid = false;
        }

        // Vérification du code postal (uniquement chiffres, 5 caractères en France)
        let inputCodePostal = document.getElementById("codePostale");
        const regexCodePostal = /^[0-9]{5}$/;
        if (!regexCodePostal.test(inputCodePostal.value.trim())) {
            afficherErreur(inputCodePostal, "Le code postal doit contenir 5 chiffres.");
            allValid = false;
        }

        // Vérification du mot de passe
        let inputPassword = document.getElementById("mot_de_passe");
        const regexPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[#?!@$%^&*-]).{8,}$/;
        if (!regexPassword.test(inputPassword.value)) {
            afficherErreur(inputPassword, "Le mot de passe ne respecte pas les critères.");
            allValid = false;
        }

        // Vérification de la confirmation du mot de passe
        let confirmPassword = document.getElementById("confirme_mot_de_passe");
        if (confirmPassword.value !== inputPassword.value) {
            afficherErreur(confirmPassword, "Les mots de passe ne correspondent pas.");
            allValid = false;
        }

        // Vérification des cases à cocher obligatoires
        let conditions = document.getElementById("accepter_conditions");
        if (!conditions.checked) {
            afficherErreur(conditions, "Vous devez accepter les conditions générales.");
            allValid = false;
        }

        // Si tout est bon, on peut soumettre
        if (allValid) {
            alert("Formulaire soumis avec succès !");
            this.submit(); // Soumettre le formulaire
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

    // Ouvrir la modale
    openLoginModal.addEventListener("click", function () {
        loginModal.style.display = "block";
    });

    // Fermer la modale
    closeLoginModal.addEventListener("click", function () {
        loginModal.style.display = "none";
    });

    // Fermer en cliquant à l'extérieur
    window.addEventListener("click", function (event) {
        if (event.target === loginModal) {
            loginModal.style.display = "none";
        }
    });

    // Toggle mot de passe
    window.togglePassword = function () {
        let passwordInput = document.getElementById("loginPassword");
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    };
});

