/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)

import "./styles/app.scss";
require("bootstrap");


// start the Stimulus application

// Tableau de citations


window.onload = () => {

    let citations = [
        ["On peut obtenir beaucoup plus avec un mot gentil et un revolver, qu'avec un mot gentil tout seul.", "Al Capone"],
        ["Je suis Jésus Christ, que vous l’acceptiez ou pas, je m’en fous.", "Charles Manson"],
        ["C'est bien la première fois qu'on m'aura pour douze balles.", "Mata Hari"],
        ["Oh ! chère France, toi que j'aime de toute mon âme, de tout mon coeur, toi à qui j'ai consacré toutes mes forces, toute mon intelligence, comment a-t-on pu m'accuser d'un crime aussi épouvantable ?", "Alfred Dreyfus"]
    ];
// Variables

//Citation affichée
let dernier = 0;

let nombreAleatoire = 0;

// Récupéreration des élements du DOM

let citation = document.getElementById('citation');

// Nom de l'auteur
let auteur = document.getElementById('auteur');

// Bouton pour générer une nouvelle citation
let bouton = document.getElementById('nouvelle_citation');

//Ecouteur d'évènements
bouton.addEventListener('click', genererCitation);

//Générer un nombre aléatoire
function genererEntier(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

function genererCitation () {
    do {
        nombreAleatoire = genererEntier(citations.length);
    } while (nombreAleatoire == dernier)
    afficher();
    dernier = nombreAleatoire;
}

function afficher() {

    citation.textContent = citations[nombreAleatoire][0];
    auteur.textContent = citations[nombreAleatoire][1];
    }
}