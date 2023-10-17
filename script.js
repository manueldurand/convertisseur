import countriesList  from './countries.js'; // contient les infos par pays de nom et code de devise
import { resizeDropdown } from './functions.js';

import { fetchCurrencyRate } from './tauxDeChange.js';

var paysSelection = document.getElementById('paysSelection');
const toggle = document.getElementById('toggle') // fenêtre cachée en attendant la sélection du pays
const currencyToConvert = document.getElementById('currencyToConvert')

var selectedCountry
let formData = new FormData();


document.addEventListener('DOMContentLoaded', function () {
    const infoButton = document.getElementById('infoButton');
    const infoPopup = document.getElementById('infoPopup');
    const closeButton = document.getElementById('closeButton');

    infoButton.addEventListener('click', function () {
        infoPopup.style.display = 'block';
    });

    closeButton.addEventListener('click', function () {
        infoPopup.style.display = 'none';
    });
});




// Affichage de la liste des pays dans le menu
countriesList.forEach(function(pays) {
    var nomPays = pays.nomPays
    var option = document.createElement("option")
    option.value = nomPays;
    option.textContent = nomPays;
    paysSelection.appendChild(option)    
});
if (paysSelection.value) {
    toggle.classList.remove("hide")
}


// Réduit la liste au choix sélectionné lorsque l'utilisateur clique en dehors du champ
paysSelection.addEventListener("blur", function () {
    this.size = 1;
});

// déclenche la fonction à la sélection d'un pays
paysSelection.addEventListener("change", e => findCountryAndConvert(), true)

/**
 * récupère le nom du pays sélectionné, et les infos de nom et code de devise dans le fichier countriesList
 * 
 * 
 */
function findCountryAndConvert() {
    let selectedCountry = document.getElementById('paysSelection').value;
    const selectedCountryInfo = countriesList.find(country => country.nomPays === selectedCountry)
    const selectedCurrencyCode = selectedCountryInfo.codeDevise
    const selectedCurrencyName = selectedCountryInfo.nomDevise
    toggle.classList.remove("hide") // permet l'affichage des valeurs de change

    while (currencyToConvert.options.length > 1) {
        currencyToConvert.remove(1)
    }
    let optionDevise = document.createElement('option')
    optionDevise.value = selectedCurrencyName
    optionDevise.textContent = selectedCurrencyName
    currencyToConvert.appendChild(optionDevise)
    optionDevise.selected = true;

    fetchCurrencyRate(selectedCurrencyCode)
    .then(response => {
        const currencyRate = response[selectedCurrencyCode];

        toggle.classList.remove("invisible")
        console.log(currencyRate);
        document.getElementById('rate').textContent = currencyRate.toFixed(2)+" "+ selectedCurrencyName;
        let invertedRate = Math.pow(currencyRate, -1).toFixed(2);
        document.getElementById('currentCurrency').textContent = selectedCurrencyName
        document.getElementById('currentInvertedRate').textContent = invertedRate;
        document.getElementById('valueToConvert').focus()

        convertTheValue(currencyRate, selectedCurrencyName)
    })

}
function convertTheValue(currencyRate, currencyName) {
    document.getElementById('convert').addEventListener('click', getAndConvert);

    document.getElementById('valueToConvert').addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            getAndConvert();
        }
    });

    function getAndConvert() {
        let valueToConvert = document.getElementById('valueToConvert').value;
        if (document.getElementById('currencyToConvert').value == currencyName) {
            document.getElementById('convertedValue').textContent = (valueToConvert / currencyRate).toFixed(2) + ' Euro';
        } else {
            document.getElementById('convertedValue').textContent = (valueToConvert * currencyRate).toFixed(2) + ' ' + currencyName;
        }
    }
}
