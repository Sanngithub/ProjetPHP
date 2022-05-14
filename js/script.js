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