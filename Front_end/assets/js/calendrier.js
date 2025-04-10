let reservations = [];
let currentDate = new Date();

document.addEventListener('DOMContentLoaded', () => {
    fetch('get_reservations.php')
        .then(res => res.json())
        .then(data => {
            reservations = data;
            updateCalendar();
        });
});
let array = [];
let FinalHeure;
let FinalMinute;
const heureGet = document.querySelector('.rdv > h1').getAttribute('data-duree');

// Divise la chaîne en parties heures, minutes, secondes
const timeParts = heureGet.split(":");

// Ajoute les éléments séparés dans le tableau 'array'
array.push(timeParts[0], timeParts[1]);

// Affiche chaque élément du tableau avec son indice
for (let i = 0; i < 1; i++) {
    FinalHeure = parseInt(array[0]);
    FinalMinute = array[1];
}
let total = FinalHeure + FinalMinute;

const scheduleContainer = document.getElementById('scheduleContainer');
const currentWeekElement = document.getElementById('currentWeek');
const availableHours = [
    { start: 8, end: 10 },
    { start: 11, end: 12 },
    { start: 13, end: 15 },
    { start: 16, end: 18 }
];


const updateCalendar = () => {
    const startOfWeek = new Date(currentDate);
    startOfWeek.setDate(currentDate.getDate() - currentDate.getDay() + 1);

    const endOfWeek = new Date(startOfWeek);
    endOfWeek.setDate(startOfWeek.getDate() + 4);
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
                hourElement.textContent = hour + "h - " + (hour + FinalHeure) + "h" + FinalMinute;

                // Ajouter l'attribut data-start-hour
                hourElement.setAttribute('data-start-hour', hour);

                const isReserved = checkReservation(day, hour);
                if (isReserved) {
                    hourElement.classList.add('reserved');
                    hourElement.textContent += " (Réservé)";
                } else {
                    hourElement.addEventListener('click', () => {
                        const type = sessionStorage.getItem('typeReparation');
                        const dateStr = day.toLocaleDateString('fr-FR');
                        const horaire = `${hour}:00 - ${hour + 1}:00`;

                        // Récupérer l'heure de début
                        const startHour = hourElement.getAttribute('data-start-hour');
                        console.log(`Heure de début du créneau : ${startHour}:00`);
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

const checkReservation = (day, hour) => {
    const slotStart = new Date(day);
    slotStart.setHours(hour, 0, 0, 0);

    return reservations.some(r => {
        const resStart = new Date(r.start);
        const resEnd = new Date(r.end);
        return slotStart >= resStart && slotStart < resEnd;
    });
};

const formatDate = (date) => date.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long' });

document.getElementById('prevWeek').addEventListener('click', () => {
    currentDate.setDate(currentDate.getDate() - 7);
    updateCalendar();
});
document.getElementById('nextWeek').addEventListener('click', () => {
    currentDate.setDate(currentDate.getDate() + 7);
    updateCalendar();
});

function openModalRdv(type, date, heure) {
    console.log("modal ouverte", type, date, heure);
    document.getElementById('typeReparation').value = titre;
    document.getElementById('dateRdv').value = date;
    let finalisation = parseInt(heure) + parseInt(FinalHeure);
    document.getElementById('horaireRdv').value = parseInt(heure) + "h - " + finalisation + "h" + FinalMinute;

    // Récupère le véhicule du client connecté
    fetch('actions/get_vehicule.php')
        .then(response => {
            console.log("Réponse brute :", response);
            if (!response.ok) throw new Error("Erreur HTTP : " + response.status);
            return response.json();
        })
        .then(data => {
            console.log("Données JSON reçues :", data);

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

    // Ouvre la modale
    document.getElementById('modalRdv').style.display = 'flex';
}

// Quand on ouvre la modale, on récupère le type de réparation
const type = sessionStorage.getItem('typeReparation');

document.querySelector('#modalRdv .close').addEventListener('click', () => {
    document.getElementById('modalRdv').style.display = 'none';
});

document.getElementById('formRdv').addEventListener('submit', e => {
    e.preventDefault();
    alert("Rendez-vous confirmé !");
    document.getElementById('modalRdv').style.display = 'none';
});

// planning interractif garage solidaire

document.addEventListener('DOMContentLoaded', () => {
    let currentDate = new Date();
    const scheduleContainer = document.getElementById('scheduleContainer');
    const currentWeekElement = document.getElementById('currentWeek');

    // Plages horaires disponibles
    const availableHours = [
        { start: 8, end: 10 },
        { start: 11, end: 12 },
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

                    // Ajouter l'attribut data-start-hour
                    hourElement.setAttribute('data-start-hour', hour);

                    hourElement.addEventListener('click', () => {
                        // Récupérer l'heure de début
                        const startHour = hourElement.getAttribute('data-start-hour');

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

    document.getElementById('prevWeekSolidaire')?.addEventListener('click', () => {
        currentDate.setDate(currentDate.getDate() - 7);
        updateCalendar();
    });

    document.getElementById('nextWeekSolidaire')?.addEventListener('click', () => {
        currentDate.setDate(currentDate.getDate() + 7);
        updateCalendar();
    });

    updateCalendar();
});
