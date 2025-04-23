// -------------------- Initialisation --------------------
let reservationsSolidaire = [];
let currentDateSolidaire = new Date();

document.addEventListener('DOMContentLoaded', () => {
    fetch('get_reservations.php')
        .then(res => res.json())
        .then(data => {
            reservationsSolidaire = data;
            updateCalendarSolidaire();
        });
});
const titreGetSolidaire = document.querySelector('.rdv_solidaire > h1')?.getAttribute('data-title');
// -------------------- Extraction de la durée --------------------
const heureGetSolidaire = document.querySelector('.rdv_solidaire > h1')?.getAttribute('data-duree');
let finalHeureSolidaire = 0;
let finalMinuteSolidaire = 0;

if (heureGetSolidaire) {
    const [heures, minutes] = heureGetSolidaire.split(":").map(Number);
    finalHeureSolidaire = heures;
    finalMinuteSolidaire = minutes;
}

// -------------------- Plages horaires disponibles --------------------
const availableHoursSolidaire = [
    { start: 8, end: 10 },
    { start: 11, end: 12 },
    { start: 13, end: 15 },
    { start: 16, end: 18 }
];

// -------------------- Mise à jour du calendrier --------------------
function updateCalendarSolidaire() {
    const scheduleContainer = document.getElementById('scheduleContainerSolidaire');
    const currentWeekElement = document.getElementById('currentWeekSolidaire');

    const startOfWeek = new Date(currentDateSolidaire);
    startOfWeek.setDate(currentDateSolidaire.getDate() - currentDateSolidaire.getDay() + 1); // Lundi

    const endOfWeek = new Date(startOfWeek);
    endOfWeek.setDate(startOfWeek.getDate() + 4); // Vendredi

    currentWeekElement.textContent = `Semaine du ${formatDateSolidaire(startOfWeek)} au ${formatDateSolidaire(endOfWeek)}`;
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

        availableHoursSolidaire.forEach(range => {
            for (let hour = range.start; hour < range.end; hour++) {
                const hourElement = document.createElement('div');
                hourElement.classList.add('hour');
                hourElement.setAttribute('data-start-hour', hour);

                const endHour = hour + finalHeureSolidaire;
                const endMinutes = finalMinuteSolidaire > 0 ? `${endHour}h${finalMinuteSolidaire}` : `${endHour}h`;
                hourElement.textContent = `${hour}h - ${endMinutes}`;

                const isReserved = checkReservationSolidaire(day, hour);
                if (isReserved) {
                    hourElement.classList.add('reserved');
                    hourElement.textContent += " (Réservé)";
                } else {
                    hourElement.addEventListener('click', () => {
                        const type = sessionStorage.getItem('typeReparation');
                        const dateStr = day.toLocaleDateString('fr-FR');
                        const horaire = `${hour}:00`;

                        openModalRdvSolidaire(type, dateStr, horaire);
                    });
                }

                hoursContainer.appendChild(hourElement);
            }
        });

        daySchedule.appendChild(hoursContainer);
        scheduleContainer.appendChild(daySchedule);
    }
}

// -------------------- Vérification des réservations --------------------
function checkReservationSolidaire(day, hour) {
    const slotStart = new Date(day);
    slotStart.setHours(hour, 0, 0, 0);

    return reservationsSolidaire.some(r => {
        const resStart = new Date(r.start);
        const resEnd = new Date(r.end);
        return slotStart >= resStart && slotStart < resEnd;
    });
}

// -------------------- Format de date --------------------
function formatDateSolidaire(date) {
    return date.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long' });
}

// -------------------- Navigation dans les semaines --------------------
document.getElementById('prevWeekSolidaire')?.addEventListener('click', () => {
    currentDateSolidaire.setDate(currentDateSolidaire.getDate() - 7);
    updateCalendarSolidaire();
});

document.getElementById('nextWeekSolidaire')?.addEventListener('click', () => {
    currentDateSolidaire.setDate(currentDateSolidaire.getDate() + 7);
    updateCalendarSolidaire();
});

// -------------------- Ouverture de la modale --------------------
function openModalRdvSolidaire(type, date, heure) {
    console.log("modal solidaire ouverte", type, date, heure);

    const titreReparation = document.querySelector('.rdv_solidaire > h1')?.getAttribute('data-titre');
    document.getElementById('typeReparation').value = titreReparation || type;
    sessionStorage.setItem('typeReparation', type);
    document.getElementById('dateRdv').value = date;
    sessionStorage.setItem('dateRdv', date);

    const heureInt = parseInt(heure);
    const finalisation = heureInt + finalHeureSolidaire;
    const horaireStr = `${heureInt}h - ${finalisation}h${finalMinuteSolidaire > 0 ? finalMinuteSolidaire : ''}`;
    document.getElementById('horaireRdv').value = horaireStr;
    sessionStorage.setItem('heureDebut', heureInt);
    sessionStorage.setItem('heureFin', finalisation);

    // Récupération du véhicule
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

    document.getElementById('modalRdv').style.display = 'flex';
}

// -------------------- Fermeture de la modale --------------------
document.querySelector('#modalRdv .close')?.addEventListener('click', () => {
    document.getElementById('modalRdv').style.display = 'none';
});

// -------------------- Validation du formulaire --------------------
document.getElementById('formRdv')?.addEventListener('submit', e => {
    e.preventDefault();
    alert("Rendez-vous confirmé !");
    document.getElementById('modalRdv').style.display = 'none';
});
document.querySelector('.btn_solidaire').addEventListener('click', function () {
    sessionStorage.setItem('garageSolidaire', 'oui');
});