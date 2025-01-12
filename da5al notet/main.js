function verif(){
    let classe = document.getElementById("classe").value;
    let nom = document.getElementById("nom").value;
    if (classe==""){
        alert("Veuillez entrer votre classe");
        return false;
    }else if (nom==""){
        alert("Veuillez entrer votre nom");
        return false;
    }
}