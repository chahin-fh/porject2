<?php
session_start();
extract($_POST);
$cnx = mysqli_connect("127.0.0.1","root","","school");
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}
$mp = hashPassword($mps);
$req = "SELECT nom,pass,id from personnes where(nom = '$nom' and pass = '$mp');" or die("problim L4");
$res = mysqli_query($cnx,$req);
$nb=mysqli_num_rows($res);
if($nb<1){
    header("refresh:0;url=index.html"); 
    echo '<script>alert("makich m3ana a 5ouya !");</script>';
}else{
    $id = mysqli_fetch_array($res);
    $_SESSION['id']=$id[2];
    header("location:../menu/index.html");
}
mysqli_close($cnx);
?>