/*-------------------------------------redirection de la navbar--------------------------------------- */

// Sélectionnez tous les boutons avec la classe "redirection-button"
const redirectButtons = document.querySelectorAll('.redirection');

// Ajoutez un gestionnaire d'événement à chaque bouton
redirectButtons.forEach(redirectButton => {
    redirectButton.addEventListener('click', () => {
        // Récupérez la valeur de l'attribut "data-page" du bouton
        const page = redirectButton.getAttribute('data-page');

        // Redirigez l'utilisateur vers la page correspondante
        // window.location.href = `${page}`;
        redirectToNewPage(page);
    });
});

/*---------------fonction pour colorer les colomnes du tableau en fonction des types------------------- */

//recupération de la colonne type pour affichage custom
let types = document.getElementsByClassName('type');
let colorTypes = document.getElementsByClassName('colorType');
//boucles sur toutes les cases types du tableau
for (let i = 0; i < types.length; i++) {
    let type = types[i].innerText;
    switch (type) {
        //changement de couleur des cases en fonction des types
        case 'FEU': (types[i].style.background = '#F75231') && (colorTypes[i].style.background = '#F75231');
            break;
        case 'EAU': (types[i].style.background = '#399CFF') && (colorTypes[i].style.background = '#399CFF');
            break;
        case 'PLANTE': (types[i].style.background = '#7BCE52') && (colorTypes[i].style.background = '#7BCE52');
            break;
        default: (types[i].style.background = '#EDCE61') && (colorTypes[i].style.background = '#EDCE61');
            break;
    }
}

/*--------------------------------page d'acceuil-------------------------------------------------- */

//recuperation des varaiables du dom
let solo = document.getElementById('solo');
let duo = document.getElementById('duo');
let log = document.getElementById('loggin_container');
let joueur1 = document.getElementById('joueur1_container');
let joueur2 = document.getElementById('joueur2_container');

//action sur les boutons solo et duo pour affichage des divs
solo.addEventListener('click', function () {
    if (joueur1.style.display = 'none') {
        solo.style.display = 'none';
        joueur1.style.display = 'block';
        joueur2.style.display = 'none';
        // redirectToNewPage('/Select/select_random');
    }
});
duo.addEventListener('click', function () {
    if ((joueur1.style.display = 'none') || (joueur2.style.display = 'none')) {
        solo.style.display = 'none';
        duo.style.display = 'none';
        joueur1.style.display = 'block';
        joueur2.style.display = 'block';
    }
});

