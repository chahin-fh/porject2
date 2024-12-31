<?php
extract($_POST);
$cnx = mysqli_connect("127.0.0.1","root","","ifbreak");
function hashPassword($mp) {
    $hashedPassword = password_hash($mp, PASSWORD_BCRYPT);
    return $hashedPassword;
}
$mph = hashPassword($mp);
$req5 = "insert into personne () values();" or die("probelm l4") ;
$res9 = mysqli_query($cnx,$req5) or die("problim ins");
$nb5 = mysqli_affected_rows($cnx);
sleep(1);
header("location:../connexion/index.html");
mysqli_close($cnx);
?>