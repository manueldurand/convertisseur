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
export { resizeDropdown }