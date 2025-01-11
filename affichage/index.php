<?php
include("../cnx.php");
$res = mysqli_query($cnx,"SELECT NM from matier");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    $res1 = mysqli_query($cnx , "SELECT n.exmen,n.cc,n.ds,p.nom,n.NF from matier as m , personnes as p , note as n where (p.id = m.id)and(p.classe='$cl')and(p.department = '$BR')and(m.NM = '$NM');");
    echo"<div class='container'>
	<div class='table'>
		<div class='table-header'>
			<div class='header__item'><h3 id='name' class='filter__link' '>Name</h3></div>
			<div class='header__item'><h3 id='wins' class='filter__link filter__link--number' >cc</h3></div>
			<div class='header__item'><h3 id='draws' class='filter__link filter__link--number' >ds</h3></div>
			<div class='header__item'><h3 id='losses' class='filter__link filter__link--number' >exemen</h3></div>
			<div class='header__item'><h3 id='total' class='filter__link filter__link--number' >NF</h3></div>
		</div>";
        while($ligne = mysqli_fetch_array($res1)){
            echo"
		<div class='table-content'>	
			<div class='table-row'>
				<div class='table-data'>$ligne[3]</div>
				<div class='table-data'>$ligne[1]</div>
				<div class='table-data'>$ligne[2]</div>
				<div class='table-data'>$ligne[0]</div>
				<div class='table-data'>$ligne[4]</div>
			</div>
		</div>";
        }
        echo"	
        </div>
</div>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affiche</title>
    <link rel="stylesheet" href="style.scss">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <style>

    </style>
</head>
<body>
    <form onsubmit="return verif()" method="post">
        <label for="">classe:</label>
        <select name="cl" id="S1" class="minimal">
            <option value="">--selectionner class--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <label for="">branch:</label>
        <select name="BR" id="S2" class="minimal">
            <option value="">--selectionner branch--</option>
            <option value="LT">LT</option>
            <option value="IOT">IOT</option>
            <option value="LM">LM</option>
        </select>
        <label for="">matier:</label>
        <select name="NM" id="S3" class="minimal">
            <option value="">--selectionner matier--</option>
            <?php
                while($t = mysqli_fetch_array($res)){
                    echo"<option value=''>$t[0]</option>";
                }
            ?>
        </select>
        <input type="submit" class="form-submit-button">
    </form>
</body>