// -------------------- Initialisation --------------------
let reservations = [];
let currentDate = new Date();

// Charger les réservations à l'ouverture
document.addEventListener('DOMContentLoaded', () => {
    fetch('get_reservations.php')
        .then(res => res.json())
        .then(data => {
            reservations = data;
            updateCalendar();
        });
});
const titreGet = document.querySelector('.rdv > h1')?.getAttribute('data-title');
// -------------------- Durée du créneau --------------------
let FinalHeure = 0;
let FinalMinute = 0;

const heureGet = document.querySelector('.rdv > h1')?.getAttribute('data-duree');
if (heureGet) {
    const [heures, minutes] = heureGet.split(":").map(Number);
    FinalHeure = heures;
    FinalMinute = minutes;
}

// -------------------- Plages horaires disponibles --------------------
const availableHours = [
    { start: 8, end: 10 },
    { start: 11, end: 12 },
    { start: 13, end: 15 },
    { start: 16, end: 18 }
];

// -------------------- Mise à jour du calendrier --------------------
const scheduleContainer = document.getElementById('scheduleContainer');
const currentWeekElement = document.getElementById('currentWeek');

const updateCalendar = () => {
    const startOfWeek = new Date(currentDate);
    startOfWeek.setDate(currentDate.getDate() - currentDate.getDay() + 1); // Lundi

    const endOfWeek = new Date(startOfWeek);
    endOfWeek.setDate(startOfWeek.getDate() + 4); // Vendredi

    currentWeekElement.textContent = `Semaine du ${formatDate(startOfWeek)} au ${formatDate(endOfWeek)}`;
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

        availableHours.forEach(range => {
            for (let hour = range.start; hour < range.end; hour++) {
                const hourElement = document.createElement('div');
                hourElement.classList.add('hour');
                hourElement.setAttribute('data-start-hour', hour);

                const endHour = hour + FinalHeure;
                const endMinutes = FinalMinute > 0 ? `${endHour}h${FinalMinute}` : `${endHour}h`;
                hourElement.textContent = `${hour}h - ${endMinutes}`;

                const isReserved = checkReservation(day, hour);
                if (isReserved) {
                    hourElement.classList.add('reserved');
                    hourElement.textContent += " (Réservé)";
                } else {
                    hourElement.addEventListener('click', () => {
                        const type = sessionStorage.getItem('typeReparation');
                        const dateStr = day.toLocaleDateString('fr-FR');
                        const horaire = `${hour}:00`;

                        console.log(`Heure de début du créneau : ${hour}:00`);
                        openModalRdv(type, dateStr, horaire);
                    });
                }

                hoursContainer.appendChild(hourElement);
            }
        });

        daySchedule.appendChild(hoursContainer);
        scheduleContainer.appendChild(daySchedule);
    }
};

// -------------------- Vérifie si une plage horaire est déjà réservée --------------------
const checkReservation = (day, hour) => {
    const slotStart = new Date(day);
    slotStart.setHours(hour, 0, 0, 0);

    return reservations.some(r => {
        const resStart = new Date(r.start);
        const resEnd = new Date(r.end);
        return slotStart >= resStart && slotStart < resEnd;
    });
};

// -------------------- Format de date FR --------------------
const formatDate = (date) => date.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long' });

// -------------------- Navigation dans les semaines --------------------
document.getElementById('prevWeek').addEventListener('click', () => {
    currentDate.setDate(currentDate.getDate() - 7);
    updateCalendar();
});

document.getElementById('nextWeek').addEventListener('click', () => {
    currentDate.setDate(currentDate.getDate() + 7);
    updateCalendar();
});

// -------------------- Ouverture de la modale --------------------
function openModalRdv(type, date, heure) {
    console.log("modal ouverte", type, date, heure);

    const titreReparation = document.querySelector('.rdv > h1')?.getAttribute('data-titre');
    document.getElementById('typeReparation').value = titreReparation || type;
    document.getElementById('dateRdv').value = date;

    const heureInt = parseInt(heure);
    const finalisation = heureInt + FinalHeure;
    const horaireStr = `${heureInt}h - ${finalisation}h${FinalMinute > 0 ? FinalMinute : ''}`;
    document.getElementById('horaireRdv').value = horaireStr;

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

    document.getElementById('modalRdv').style.display = 'flex';
}

// -------------------- Fermeture de la modale --------------------
document.querySelector('#modalRdv .close').addEventListener('click', () => {
    document.getElementById('modalRdv').style.display = 'none';
});

// -------------------- Validation du formulaire --------------------
document.getElementById('formRdv').addEventListener('submit', e => {
    e.preventDefault();
    alert("Rendez-vous confirmé !");
    document.getElementById('modalRdv').style.display = 'none';
});
