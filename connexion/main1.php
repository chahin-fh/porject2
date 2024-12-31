<?php
session_start();
extract($_POST);
$cnx = mysqli_connect("127.0.0.1","root","","school");
function verifyPassword($enteredPassword, $storedHash) {
    // Verify the entered password against the stored hash
    if (password_verify($enteredPassword, $storedHash)) {
        // Password is correct
        return true;
    } else {
        // Password is incorrect
        return false;
    }
}

// Example usage:
$enteredPassword = "mySecurePassword123!";
if (verifyPassword($enteredPassword, $hashedPassword)) {
    echo "Password is correct!";
} else {
    echo "Invalid password.";
}
$req = "SELECT nom,passe,id from personne where(nom = '$nom' and passe = '$mpc');" or die("problim L4");
$res = mysqli_query($cnx,$req);
$nb=mysqli_num_rows($res);
if($nb<1){
    header("refresh:0;url=index.html"); 
    echo '<script>document.getElementById("er").innerHTML = "makich m3ana a 5ouya"</script>';
}else{
    $id = mysqli_fetch_array($res);
    $_SESSION['id']=$id[2];
    header("location:../menu/index.html");
}
mysqli_close($cnx);
?>