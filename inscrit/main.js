function verif() {
    let type=document.getElementById("type").value;
    let nom=document.getElementById("nom").value;
    let mail=document.getElementById("mail").value;
    let num=document.getElementById("num").value; //vide
    let adr=document.getElementById("adr").value; //vide
    let vill=document.getElementById("vill").value;
    let cp=document.getElementById("cp").value;
    let p=document.getElementById("p").value;
    let dep=document.getElementById("dep").value;
    

    if (type=="") {
        alert("donner voutre type de paersoone");

    }else if(type=="Etudient"){
        if(!verif_nom(nom)){
            alert("verifer votre nom");
            return false;
        }else if(!verif_mail(mail)){
            alert("verifer votre mail");
            return false;
        }else if(num!=""){
            if(!verif_num(num)){
                alert("verifer votre num");
                return false;
            }
        }else if(adr!=""){
            if(adr.length>20){
                alert("verifer votre adr");
                return false;
            }
        }else if(vill==""){
            alert("donner vore ville");
            return false;
        }else if(cp.length!=4){
            alert("verifer votre cp");
            return false;
        }else if(p==""){
            alert("donner votre paye");
            return false;
        }else if(dep!=""){
            d=["LT","IOT","LM"];
            if (!(dep.includes(d))){
                alert("verifer votre departement");
            }
        }
}
}
function verif_mail(ch) {
    const domainesAcceptes = ["@gmail.com", "@outlook.com", "@yahoo.com", "@hotmail.com", "@icloud.com", "@protonmail.com"];
    let pos = ch.indexOf("@");
    if (pos === -1) {
        return false;
    }
    let domaine = ch.substring(pos);
    return domainesAcceptes.includes(domaine);
}
function affiche_pass(){
    var mot_de_passe=document.getElementById("mp1");
    var mot_de_passe2=document.getElementById("mp2");
    var checked = document.getElementById("ch").checked;
    if (checked) {
        mot_de_passe.type="text";
        mot_de_passe2.type="text";
    }else{
        mot_de_passe.type="password";
        mot_de_passe2.type="password";
    }
}
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('type').addEventListener('change', function() {
        let typeValue = this.value;
        let etudiantFields = document.getElementById('etudiant_fields');
        let professeurFields = document.getElementById('professeur_fields');

        if (typeValue === 'etudiant') {
            etudiantFields.style.display = 'block';
            professeurFields.style.display = 'none';
        } else if (typeValue === 'professeur') {
            etudiantFields.style.display = 'none';
            professeurFields.style.display = 'block';
        } else {
            etudiantFields.style.display = 'none';
            professeurFields.style.display = 'none';
        }
    });
});
function affiche_pass() {
    var mot_de_passe = document.getElementById("password");
    var checkbox = document.getElementById("ch");
    if (checkbox.checked) {
        mot_de_passe.type = "text";
    } else {
        mot_de_passe.type = "password";
    }
}
function chiffrer(ch) {
    const decalage = 3; // Décalage fixe
    let chc = '';
    for (let i = 0; i < ch.length; i++) {
        let code = ch.charCodeAt(i);
        // Si c'est une lettre majuscule
        if (code >= 65 && code <= 90) {
            chc += String.fromCharCode(((code - 65 + decalage) % 26) + 65);
        }
        // Si c'est une lettre minuscule
        else if (code >= 97 && code <= 122) {
            chc += String.fromCharCode(((code - 97 + decalage) % 26) + 97);
        }
        // Sinon, conserver le caractère original
        else {
            chc += ch[i];
        }
    }
    return chc;
}
function verif_mail(ch) {
    const domainesAcceptes = ["@gmail.com", "@outlook.com", "@yahoo.com", "@hotmail.com", "@icloud.com", "@protonmail.com"];
    let pos = ch.indexOf("@");
    if (pos === -1) {
        return false;
    }
    let domaine = ch.substring(pos);
    return domainesAcceptes.includes(domaine);
}
function verif_nom(ch) {
    let i = 0;
    while (i < ch.length) {
        let char = ch.charAt(i).toUpperCase();
        if ((char >= 'A' && char <= 'Z') || (ch.charAt(i) >= "0" && ch.charAt(i) <= "9") || (ch.charAt(i) == ".") || (ch.charAt(i) ==" ")) {
            i++;
        } else {
            break;
        }
    }
    return i == ch.length && ch.length >= 8;
}
function verif_num(ch){
    if (!(ch.charAt(0) == "2" || ch.charAt(0) == "5" || ch.charAt(0) == "9" && ch.length==8)) {
        return false;
    }
}