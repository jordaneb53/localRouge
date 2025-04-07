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

    document.getElementById('prevWeek')?.addEventListener('click', () => {
        currentDate.setDate(currentDate.getDate() - 7);
        updateCalendar();
    });

    document.getElementById('nextWeek')?.addEventListener('click', () => {
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
