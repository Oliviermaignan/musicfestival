//verifier si le btn existe dans la page chargé
let validationBtn = document.querySelector(".boutonSoumissionFormulaire");
if (validationBtn !== null) {
    validationBtn.addEventListener('click', ()=>{
        validation();
    })
}

function validation(e) {
    const nom = document.getElementById('nom');
    const prenom = document.getElementById('prenom');
    const email = document.getElementById('email');
    const telephone = document.getElementById('telephone');
    const adressePostale = document.getElementById('adressePostale');
    const motDePasse = document.getElementById('motDePasse');
    if (
        nom.value === '' ||
        prenom.value === '' ||
        email.value === '' ||
        telephone.value === '' ||
        adressePostale.value === '' ||
        motDePasse.value === ''
    ) {
        console.log('non valide');
        return false;
    } else {
        console.log('go');
        return true;
    }
}
