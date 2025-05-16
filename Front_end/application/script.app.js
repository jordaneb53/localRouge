document.addEventListener('DOMContentLoaded', function () {
    // Nettoyer les erreurs existantes au chargement de la page
    document.querySelectorAll(".error").forEach(function (divError) {
        divError.classList.remove("error");
        let errorDiv = divError.querySelector(".error-message");
        if (errorDiv) divError.removeChild(errorDiv);
    });

    const form = document.querySelector('.login-form');

    form.addEventListener('submit', function (event) {
        let allValid = true;

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

        if (!allValid) {
            event.preventDefault(); // Empêche la soumission si des erreurs sont présentes
            console.log("Des erreurs sont présentes");
        } else {
            console.log("Formulaire valide");
        }
    });

    document.querySelector('.toggle-password1').addEventListener('click', togglePasswordVisibility);
});

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

function togglePasswordVisibility() {
    var passwordField = document.getElementById('loginPassword');
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const navItems = document.querySelectorAll('.nav-bar li');
    const sections = document.querySelectorAll('.content-section');

    navItems.forEach(item => {
        item.addEventListener('click', function () {
            // Masquer toutes les sections
            sections.forEach(section => {
                section.classList.remove('active');
            });

            const sectionId = item.getAttribute('data-section');
            const targetSection = document.getElementById(sectionId);

            if (targetSection) {
                targetSection.classList.add('active');

                // Pour la section "clients", afficher les données
                if (sectionId === 'clients') {
                    // Charge le contenu PHP de la section
                    fetch('/application/' + sectionId + '.php')
                        .then(response => {
                            if (!response.ok) throw new Error('Erreur réseau');
                            return response.text();
                        })
                        .then(html => {
                            targetSection.innerHTML = html; // Affiche le contenu PHP dans la section

                            // Appelle afficherTableauClients après le chargement du contenu
                            afficherTableauClients(); // Appel de la fonction pour afficher la table
                        })
                        .catch(error => {
                            targetSection.innerHTML = `<p>Erreur de chargement de ${sectionId}.php</p>`;
                            console.error(`Erreur lors du chargement de ${sectionId}.php:`, error);
                        });
                }
            }
        });
    });
});

// Fonction pour afficher la table des clients
function afficherTableauClients() {
    const wrapper = document.getElementById("wrapper");

    // Vérifie si l'élément #wrapper existe
    if (wrapper) {
        fetch('/application/clients_data.php')
            .then(response => response.json())
            .then(utilisateurs => {
                new gridjs.Grid({
                    columns: ["Nom", "Prénom", "Adresse", "Email", "Action"],
                    data: utilisateurs.map(user => [
                        user.nom_utilisateurs,
                        user.prenom_utilisateurs,
                        user.adresse_utilisateurs,
                        user.email_utilisateurs,
                        gridjs.html(`
                            <button class="btn-modifier" data-id="${user.Id_utilisateurs}">Modifier</button>
                            <button onclick="if(confirm('Supprimer ?')) window.location.href='supprimer_client.php?id=${user.Id_utilisateurs}'">Supprimer</button>
                        `)
                    ]),
                    pagination: {
                        limit: 10,
                        showing: false,
                    },
                    search: true,
                    sort: true,
                    language: {
                        'search': {
                            'placeholder': 'Rechercher...'
                        },
                        'pagination': {
                            'previous': 'Précédent',
                            'next': 'Suivant',
                            'showing': 'Affichage de',
                            'results': 'résultats'
                        },
                        'sort': {
                            'asc': 'Tri croissant',
                            'desc': 'Tri décroissant'
                        }
                    }
                }).render(wrapper);
            })
            .catch(error => {
                console.error("Erreur lors du chargement des utilisateurs :", error);
            });
    } else {
        console.error("L'élément #wrapper n'a pas été trouvé dans le DOM");
    }
}
// OUVERTURE de la modale
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-modifier')) {
        const userId = e.target.getAttribute('data-id');

        const modal = document.getElementById('modal-client');
        const modalBody = document.getElementById('modal-body-clients');

        // Affiche la modale
        modal.style.display = 'flex';
        modal.classList.add('show');

        // Charge dynamiquement le formulaire
        fetch(`/application/modifier_clients.php?id=${userId}`)
            .then(response => response.text())
            .then(html => {
                modalBody.innerHTML = html;
            })
            .catch(error => {
                modalBody.innerHTML = "<p>Erreur lors du chargement du formulaire.</p>";
                console.error(error);
            });
    }
});

// FERMETURE de la modale
document.addEventListener('click', function (e) {
    if (
        e.target.classList.contains('close-clients') ||
        e.target.classList.contains('modal-clients')
    ) {
        document.getElementById('modal-client').style.display = 'none';
    }
});
// Fonction pour récupérer et afficher les pièces
function loadPieces() {
    fetch('pieces.php')  // Remplace par le chemin vers ton fichier PHP
        .then(response => response.json())
        .then(data => {
            console.log(data); // Vérifie la structure des données renvoyées par PHP
            let piecesList = document.getElementById('piecesList');
            piecesList.innerHTML = ''; // Efface les anciennes données avant d'ajouter les nouvelles

            data.forEach(piece => {
                let row = document.createElement('tr');

                row.innerHTML = `
                    <td>${piece.nom_pieces || 'Non défini'}</td>
                    <td>${piece.marque_pieces || 'Non défini'}</td>
                    <td>${piece.model_pieces || 'Non défini'}</td>
                    <td>${piece.reference_pieces || 'Non défini'}</td>
                    <td>${piece.nom_operations || 'Non défini'}</td> <!-- Afficher le nom de l'opération -->
                    <td><button class="btn-modifierPiece" data-id="${piece.id_pieces}">Modifier</button><button class="btn-supprimerPiece" data-id="${piece.id_pieces}">Suprimer</button></td>
                `;

                piecesList.appendChild(row);
            });
        })
        .catch(error => console.error('Erreur:', error));
}

// Charger les pièces lorsque la page est prête
window.onload = loadPieces;
// Fonction pour supprimer une pièce
function supprimerPiece(id) {
    fetch('supprimer_pieces.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: id }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Pièce supprimée avec succès");
                loadPieces(); // Recharger la liste après suppression
            } else {
                alert("Erreur lors de la suppression : " + data.message);
            }
        })
        .catch(error => console.error('Erreur:', error));
}

// Fonction pour afficher les détails d'une pièce dans le formulaire
function modifierPiece(id) {
    fetch(`modifier_pieces.php?id=${id}`)
        .then(response => response.json())
        .then(piece => {
            if (piece.success === false) {
                alert(piece.message);
                return;
            }

            // Remplir le formulaire avec les données de la pièce
            document.getElementById('nom_pieces').value = piece.nom_pieces;
            document.getElementById('marque_pieces').value = piece.marque_pieces;
            document.getElementById('model_pieces').value = piece.model_pieces;
            document.getElementById('reference_pieces').value = piece.reference_pieces;
            document.getElementById('id_operations').value = piece.Id_operations;

            // Afficher le formulaire de modification
            document.getElementById('modifier-form').style.display = 'block';

            // Soumettre le formulaire de modification
            document.getElementById('edit-piece-form').onsubmit = function (event) {
                event.preventDefault();

                const formData = new FormData(event.target);

                fetch('modifier_pieces.php', {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Pièce mise à jour avec succès");
                            loadPieces(); // Recharger la liste après modification
                        } else {
                            alert("Erreur lors de la mise à jour : " + data.message);
                        }
                    })
                    .catch(error => console.error('Erreur:', error));
            };
        })
        .catch(error => console.error('Erreur:', error));
}

// Ajouter des gestionnaires d'événements pour les boutons Modifier et Supprimer
document.addEventListener('DOMContentLoaded', () => {
    loadPieces(); // Charger les pièces au démarrage

    document.body.addEventListener('click', (event) => {
        if (event.target.classList.contains('btn-modifierPiece')) {
            const id = event.target.getAttribute('data-id');
            modifierPiece(id);
        }

        if (event.target.classList.contains('btn-supprimerPiece')) {
            const id = event.target.getAttribute('data-id');
            const confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette pièce ?");
            if (confirmation) {
                supprimerPiece(id);
            }
        }
    });
});
