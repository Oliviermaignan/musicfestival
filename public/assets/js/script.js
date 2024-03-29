let reserv = document.getElementById("reservation")
let option = document.getElementById("options");
let coordonnee = document.getElementById("coordonnees");

const button = document.querySelectorAll(".bouton");

function showReservation() {
  reserv.style.display = "inline-block";
  option.style.display = "none";
  coordonnee.style.display = "none";
}

function showOptions() {
  reserv.style.display = "none";
  option.style.display = "inline-block";
  coordonnee.style.display = "none";
}

function showCoordonnees() {
  reserv.style.display = "none";
  option.style.display = "none";
  coordonnee.style.display = "inline-block";
}

// Afficher le premier formulaire
showReservation();

// Passer du premier au deuxième formulaire
button[0].addEventListener("click", (event) => {
  
            showOptions();
       
      });
// Passer du deuxième au troisième formulaire
button[1].addEventListener("click", (event) => {
  showCoordonnees();
});
button[2].addEventListener("click", (event) => {
    showReservation();
});
button[4].addEventListener("click", (event) => {
    showOptions();
});

// afficher les tarif réduits

function MontrerTarifReduit() {
    const checkbox = document.getElementById("tarifReduit");
    var passReduit = document.getElementById("passTarifReduit");

    if (checkbox.checked) {
        passReduit.style.display = "block";
    } else {
        passReduit.style.display = "none";
    }
    console.log(MontrerTarifReduit);
}