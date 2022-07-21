/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)

import "./styles/app.scss";
require("bootstrap");

require("@fortawesome/fontawesome-free/css/all.min.css");
require("@fortawesome/fontawesome-free/js/all.js");

// start the Stimulus application

// Tableau de citations

const menuBtn = document.querySelector(".menu-icon span");
const searchBtn = document.querySelector(".search-icon");
const cancelBtn = document.querySelector(".cancel-icon");
const items = document.querySelector(".nav-items");
const form = document.querySelector("form");
menuBtn.onclick = ()=>{
  items.classList.add("active");
  menuBtn.classList.add("hide");
  searchBtn.classList.add("hide");
  cancelBtn.classList.add("show");
}
cancelBtn.onclick = ()=>{
  items.classList.remove("active");
  menuBtn.classList.remove("hide");
  searchBtn.classList.remove("hide");
  cancelBtn.classList.remove("show");
  form.classList.remove("active"); 
}
searchBtn.onclick = ()=>{
  form.classList.add("active");
  searchBtn.classList.add("hide");
  cancelBtn.classList.add("show");
}

window.onload = () => {

    let citations = [
        ["On peut obtenir beaucoup plus avec un mot gentil et un revolver, qu'avec un mot gentil tout seul.", "Al Capone"],
        ["Je suis Jésus Christ, que vous l’acceptiez ou pas, je m’en fous.", "Charles Manson"],
        ["C'est bien la première fois qu'on m'aura pour douze balles.", "Mata Hari"],
        ["Oh ! chère France, toi que j'aime de toute mon âme, de tout mon coeur, toi à qui j'ai consacré toutes mes forces, toute mon intelligence, comment a-t-on pu m'accuser d'un crime aussi épouvantable ?", "Alfred Dreyfus"]
        ["Vous les Américains, vous traitez le tiers monde comme un paysan irakien traite sa nouvelle épouse. Trois jours de lune de miel, puis c'est parti pour les champs.", "Saddam Hussein"],
        ["Marat pervertissait la France. J’ai tué un homme pour en sauver cent mille, un scélérat pour sauver des innocents, une bête féroce pour donner le repos à mon pays. J’étais républicaine bien avant la Révolution.", "Charlotte Corday"]
        ["Vous parlez toujours de ma tête, Monsieur l'avocat général. Je regrette de n'en avoir pas plusieurs à vous offrir !", "Henri-Désiré Landru"]
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