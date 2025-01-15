<?php
include("../cnx.php");
session_start();
$id = $_SESSION['id'];
$res = mysqli_query($cnx , "SELECT nom from personnes where id = '$id'");
$nom = mysqli_fetch_array($res)[0];
    extract($_POST);
    $res1 = mysqli_query($cnx , "SELECT NM,cc,ds,exmen,NF from note where nomE = '$nom';");
    echo"
    <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>affiche</title>
    <link rel='stylesheet' href='style.scss'>
    <link rel='stylesheet' href='style.css'>
    <script src='main.js'></script>
    <style>
    </style>
</head>
    <div class='container'>
	<div class='table'>
		<div class='table-header'>
        	<div class='header__item'><h3 id='wins' class='filter__link filter__link--number' >NM</h3></div>
			<div class='header__item'><h3 id='wins' class='filter__link filter__link--number' >cc</h3></div>
			<div class='header__item'><h3 id='draws' class='filter__link filter__link--number' >ds</h3></div>
			<div class='header__item'><h3 id='losses' class='filter__link filter__link--number' >exemen</h3></div>
			<div class='header__item'><h3 id='total' class='filter__link filter__link--number' >NF</h3></div>
		</div>";
        while($ligne = mysqli_fetch_array($res1)){
            echo"
		<div class='table-content'>	
			<div class='table-row'>
            	<div class='table-data'>$ligne[0]</div>
				<div class='table-data'>$ligne[1]</div>
				<div class='table-data'>$ligne[2]</div>
				<div class='table-data'>$ligne[3]</div>
				<div class='table-data'>$ligne[4]</div>
			</div>
		</div>";
        }
        echo"	
        </div>
</div>'
";
?>