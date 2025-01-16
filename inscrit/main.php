<?php
include("../cnx.php");
extract($_POST);
$res = mysqli_query($cnx,"SELECT * from personnes where  (num_tell='$phone' and email='$email' and nom='$name');");
$nb = mysqli_num_rows($res);
$d = date("Y-m-d");
if($nb>0){
    die("enti m3ana deja chef");
}elseif($type === "Etudiant"){
    $res = mysqli_query($cnx,"SELECT count(classe) from personnes where department = '$department' and typ = 'Etudiant';");
    $j = mysqli_fetch_array($res)[0];
    if($j>0){
    $c = 1;
    if($j % 20 === 0 ){
        $c = $j / 20;
    }else {
        $c = floor($j);
    }
    $c = (string) $c;
    $a = (string) $academic_level;
    $classe = $a . $department . $c;
}else{
    $a = (string) $academic_level;
    $classe = $a . $department . "1";
}
$resE = mysqli_query($cnx, "INSERT INTO personnes (typ, nom , pass , email, num_tell, adress, ville, code_p, paye, department, date_nais, niveau_etud, date_inscrit,classe) VALUES ('$type', '$name','$password', '$email', '$phone', '$address', '$city', '$postal_code', '$country', '$department', '$date_of_birth', '$academic_level', '$d' ,'$classe');") or die("l24");
header("location:../connexion/main1.php");
}elseif($type === "Professeur"){
    $resP = mysqli_query($cnx, "INSERT INTO personnes (typ, nom , pass , email, num_tell, adress, ville, code_p, paye, department,titre,date_deb) VALUES ('$type', '$name','$password' ,  '$email', '$phone', '$address', '$city', '$postal_code', '$country', '$department', '$academic_title', '$d');") or die("l24");
    header("location:../connexion/main1.php");
}

?>