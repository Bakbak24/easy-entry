let pageName = document.querySelector('body').getAttribute('data-page');

// Functie om de gegevens van de huidige stap te laden vanuit het bijbehorende JSON-bestand
function loadStepData(themeName, stepNumber) {
    fetch('themes.json') // Laad het JSON-bestand met de themagegevens
        .then(response => response.json()) // Converteer de respons naar een JSON-object
        .then(themesData => { // Gebruik de geladen gegevens voor de huidige stap
            const stepData = themesData[themeName][`step${stepNumber}`];
            if (stepData) {
                const stepsLeft = document.querySelector('.steps-left');

                // Pas de inhoud van de huidige stap aan
                stepsLeft.innerHTML = `
                    <div class="step-image">
                        <img src="images/registration-steps-${stepNumber}.png" alt="Step ${stepNumber}" />
                    </div>
                    <button>${stepData.button}</button>
                    <h2>${stepData.h2}</h2>
                    <p>${stepData.p}</p>
                `;
            } else {
                console.error(`Geen gegevens gevonden voor ${themeName} - stap ${stepNumber}`);
            }
        })
        .catch(error => console.error('Er is een fout opgetreden bij het laden van de JSON:', error));
}

// Eventlistener voor klikken op de knoppen in de stappen
document.querySelectorAll('.step-tw').forEach((button, index) => {
    button.addEventListener('click', () => {
        const stepNumber = 2; // Indexen beginnen bij 0, stappen beginnen bij 1
        const themeName = document.querySelector('body').getAttribute('data-page');
        loadStepData(themeName, stepNumber);
    });
});

document.querySelectorAll('.step-th').forEach((button, index) => {
    button.addEventListener('click', () => {
        const stepNumber = 3; // Indexen beginnen bij 0, stappen beginnen bij 1
        const themeName = document.querySelector('body').getAttribute('data-page');
        loadStepData(themeName, stepNumber);
    });
});