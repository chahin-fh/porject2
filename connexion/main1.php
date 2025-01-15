<?php
session_start();
extract($_POST);
include("../cnx.php");

$req = "SELECT nom,pass,id from personnes where(nom = '$nom' and pass = '$mps');" or die("problim L4");
$res = mysqli_query($cnx,$req);
$nb=mysqli_num_rows($res);
if($nb<1){
    header("refresh:0;url=index.html"); 
    echo '<script>alert("makich m3ana a 5ouya !");</script>';
}else{
    $id = mysqli_fetch_array($res);
    $_SESSION['id']=$id[2];
    sleep(1);
    header("location:../menu/index.php");
}
mysqli_close($cnx);
?>