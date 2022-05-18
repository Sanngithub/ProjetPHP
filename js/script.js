function verifierMdp() {
    let ok = true;
    const mdp = document.formulaire.password.value;

    // on teste la présence de chiffre et de lettres
    if (mdp.search(/\d/) !== -1 && mdp.search(/[a-zA-Z]/) !== -1 ) {
        document.getElementById("case1").src = "../pictures/coche.jpg";
    } else {
        document.getElementById("case1").src = "../pictures/vide.png";
        ok = false;
    }
    
    // on teste la présence de caractère spécial
    if (mdp.search(/[-+_!@#$%^&*.,?]/) !== -1) {
        document.getElementById("case2").src = "../pictures/coche.jpg";
    } else {
        document.getElementById("case2").src = "../pictures/vide.png";
        ok = false;
    }

    // on teste la longueur du mot de passe
    if (mdp.length >= 6 && mdp.length < 35) {
        document.getElementById("case3").src = "../pictures/coche.jpg";
    } else {
        document.getElementById("case3").src = "../pictures/vide.png";
        ok = false;
    }

    if (ok) {
        document.querySelector(".msg-unvalid-password").style.display = 'none';
        document.querySelector(".msg-valid-password").style.display = 'block';
    } else {
        document.querySelector(".msg-unvalid-password").style.display = 'block';
        document.querySelector(".msg-valid-password").style.display = 'none';
    }

    return ok;
}


function verifierPseudo() {
    let ok = true;
    const PSEUDO = document.formulaire.pseudo.value;

    // on teste la présence de chiffres ou de lettres
    if (PSEUDO.search(/\d/) !== -1 || PSEUDO.search(/[a-zA-Z]/) !== -1 ) {
        document.getElementById("case1user").src = "../pictures/coche.jpg";
    } else {
        document.getElementById("case1user").src = "../pictures/vide.png";
        ok = false;
    }
    
    // on teste la non-présence de caractère spécial
    if (PSEUDO.search(/[-+_!><:;()@#$%^&*., ?]/) !== -1) {
        document.getElementById("case2user").src = "../pictures/vide.png";
        ok = false;
    } else {
        document.getElementById("case2user").src = "../pictures/coche.jpg";
    }

    // on teste la longueur pseudo
    if (PSEUDO.length >= 3 && PSEUDO.length < 15) {
        document.getElementById("case3user").src = "../pictures/coche.jpg";
    } else {
        document.getElementById("case3user").src = "../pictures/vide.png";
        ok = false;
    }

    if (ok) {
        document.querySelector(".msg-unvalid-pseudo").style.display = 'none';
        document.querySelector(".msg-valid-pseudo").style.display = 'block';
    } else {
        document.querySelector(".msg-unvalid-pseudo").style.display = 'block';
        document.querySelector(".msg-valid-pseudo").style.display = 'none';
    }

    return ok;
}
