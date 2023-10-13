import countriesList  from './countries.js';
import { resizeDropdown } from './functions.js';

import { fetchCurrencyRate } from './tauxDeChange.js';

var paysSelection = document.getElementById('paysSelection');
const toggle = document.getElementById('toggle')

var selectedCountry
let formData = new FormData();
// async function main() {
//     const currencyRate = await fetchCurrencyRate(currency);
//     console.log(currencyRate); // Utilisez les taux ici
// }

// main();





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


paysSelection.addEventListener("change", e => findCountry(), true)

function findCountry() {
    let selectedCountry = document.getElementById('paysSelection').value;
    const selectedCountryInfo = countriesList.find(country => country.nomPays === selectedCountry)
    console.log(selectedCountry);
    console.log(selectedCountryInfo);
    const selectedCurrencyCode = selectedCountryInfo.codeDevise
    const selectedCurrencyName = selectedCountryInfo.nomDevise
    console.log(selectedCurrencyCode);
    
    fetchCurrencyRate(selectedCurrencyCode)
    .then(response => {
        const currencyRate = response[selectedCurrencyCode];

        console.log(currencyRate);
        document.getElementById('rate').textContent = currencyRate.toFixed(3)+" "+ selectedCurrencyName;
        let invertedRate = Math.pow(currencyRate, -1).toFixed(3);
        document.getElementById('currentCurrency').textContent = selectedCurrencyName
        document.getElementById('currentInvertedRate').textContent = invertedRate;


    toggle.classList.remove("hide")
    })


}


