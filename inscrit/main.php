<?php
extract($_POST);
include("../cnx.php");
if ($type == "Professeur"){
    $res = mysqli_query($cnx, "INSERT INTO personnes (typ, nom, email, num_tell, adress, ville, code_p, paye, department, titre, date_deb, pass) VALUES ($type, $name, $email, $phone, $address, $city, $postal_code, $country, $department, $academic_title, $hire_date, $password)");
    echo "<script>alert('Professeur Ajouter');</script>";
}else if ($type == "Etudiant"){
    $res = mysqli_query($cnx, "INSERT INTO personnes (typ, nom, email, num_tell, adress, ville, code_p, paye, department, date_nais, niveau_etud, date_inscrit) VALUES ($type, $name, $email, $phone, $address, $city, $postal_code, $country, $department, $date_of_birth, $academic_level, $enrollment_date)");
    echo "<script>alert('Etudiant Ajouter');</script>";

}else{
    echo "<script>alert('Donner voutre Type');</script>";
}
sleep(1);
header("location:../connexion/index.html");
mysqli_close($cnx);
?>