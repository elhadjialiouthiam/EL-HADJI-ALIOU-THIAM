var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  
let prenom = document.querySelector("#prenom");
let prenominf = document.querySelector("#prenominf");
console.log(prenom);

let nom = document.querySelector("#nom");
let nominf = document.querySelector("#nominf");

let login = document.querySelector("#login");
let logininf = document.querySelector("#logininf");

let password = document.querySelector("#mdp");
let passwordinf = document.querySelector("#mdpinf");

let cpassword = document.querySelector("#cmdp");
let cpasswordinf = document.querySelector("#cmdpinf");
let btnSumbmit = document.querySelector("#btnSumbmit");

function validPrenom() {  
    if (prenom.value === "") {
        prenominf.innerHTML = "champ obligatoire"
    }
}
function validNom() {
    if (nom.value === "") {
        nominf.innerHTML = "champ obligatoire"
    } 
}
function validLogin() {
    if (login.value === "") {
        logininf.innerHTML = "champ obligatoire"
    } 
}
function validMdp() {
    if (password.value === "") {
        passwordinf.innerHTML = "champ obligatoire"
    } 
}
function validCmdp() {
    if (cpassword.value === "") {
        cpasswordinf.innerHTML = "champ obligatoire"
    } 
}   