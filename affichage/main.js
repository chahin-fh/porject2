function verif(){
    let S1 = document.getElementById("S1").selectedIndex;
    let S2 = document.getElementById("S2").selectedIndex;
    let S3 = document.getElementById("S3").selectedIndex;
    if(S1 == 0){
        alert("i5tar classe ya 7ayawan !")
        return false
    }else if (S2== 0 ){
        alert("i5tar branch ya 7ayawan !")
        return false
    }else if(S3 == 0){
        alert("i5tar matiere ya 7ayawan !")
        return false
    }
}