
var selectedCountry

let formData = new FormData();

var paysSelection = document.getElementById('paysSelection');
const toggle = document.getElementById('toggle')
// console.log(countries);
// let countriesList = JSON.parse(countries)
let countriesList = listePays.json

//console.log(countriesList);
// console.log(listePays.json);
countriesList.forEach(function(pays) {
    var nomPays = pays.nomPays;
    var option = document.createElement("option");
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
function resizeDropdown() {
    if (paysSelection.value) {
        paysSelection.size = 1; // Réduire la taille du menu déroulant à 1 après sélection
        paysSelection.classList.remove("open");
    } else {
        toggle.classList.add("hide")
        paysSelection.classList.add("open")
        console.log("open");
        paysSelection.size = 15; // Augmenter la taille du menu déroulant à 15 au clic
    }
}

document.getElementById('OK').addEventListener("click", findCountryAndGetRate)

function findCountryAndGetRate() {
    let selectedCountry = document.getElementById('paysSelection').value;
    // console.log(selectedCountry);
    formData.append("selectedCountry", selectedCountry)
    fetch("Control/findCurrency.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        // Extrayez les données de la réponse JSON
        const pays = data.pays;
        const devise = data.devise;
        const taux = data.taux;
        const code = data.code;
        document.getElementById('rate').textContent = taux.toFixed(3)+" "+ devise;
        let invertedRate = Math.pow(taux, -1).toFixed(3);
        document.getElementById('currentCurrency').textContent = devise
        document.getElementById('currentInvertedRate').textContent = invertedRate;

    })
    .catch(error => alert("Erreur : " + error))
    toggle.classList.remove("hide")
}