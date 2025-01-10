<?php
include("../cnx.php");
//fazit il server bil if
$res = mysqli_query($cnx , "SELECT nom from personne where classe = '$slt';");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affiche</title>
    <link rel="stylesheet" href="style.scss">
    <script src="main.js"></script>
</head>
<body>
    <form method="post">
    <label for="">classe:</label>
    <select name="" id="">
        <option value=""></option>
    </select>
    <input type="submit" value="select">
    </form>

</body>