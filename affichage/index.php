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
    <script src="main.js"></script>
    <style>
        select {

/* styling */
background-color: white;
border: thin solid blue;
border-radius: 4px;
display: inline-block;
font: inherit;
line-height: 1.5em;
padding: 0.5em 3.5em 0.5em 1em;

/* reset */

margin: 0;      
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
-webkit-appearance: none;
-moz-appearance: none;
}


/* arrows */

select.classic {
background-image:
  linear-gradient(45deg, transparent 50%, blue 50%),
  linear-gradient(135deg, blue 50%, transparent 50%),
  linear-gradient(to right, skyblue, skyblue);
background-position:
  calc(100% - 20px) calc(1em + 2px),
  calc(100% - 15px) calc(1em + 2px),
  100% 0;
background-size:
  5px 5px,
  5px 5px,
  2.5em 2.5em;
background-repeat: no-repeat;
}

select.classic:focus {
background-image:
  linear-gradient(45deg, white 50%, transparent 50%),
  linear-gradient(135deg, transparent 50%, white 50%),
  linear-gradient(to right, gray, gray);
background-position:
  calc(100% - 15px) 1em,
  calc(100% - 20px) 1em,
  100% 0;
background-size:
  5px 5px,
  5px 5px,
  2.5em 2.5em;
background-repeat: no-repeat;
border-color: grey;
outline: 0;
}




select.round {
background-image:
  linear-gradient(45deg, transparent 50%, gray 50%),
  linear-gradient(135deg, gray 50%, transparent 50%),
  radial-gradient(#ddd 70%, transparent 72%);
background-position:
  calc(100% - 20px) calc(1em + 2px),
  calc(100% - 15px) calc(1em + 2px),
  calc(100% - .5em) .5em;
background-size:
  5px 5px,
  5px 5px,
  1.5em 1.5em;
background-repeat: no-repeat;
}

select.round:focus {
background-image:
  linear-gradient(45deg, white 50%, transparent 50%),
  linear-gradient(135deg, transparent 50%, white 50%),
  radial-gradient(gray 70%, transparent 72%);
background-position:
  calc(100% - 15px) 1em,
  calc(100% - 20px) 1em,
  calc(100% - .5em) .5em;
background-size:
  5px 5px,
  5px 5px,
  1.5em 1.5em;
background-repeat: no-repeat;
border-color: green;
outline: 0;
}





select.minimal {
background-image:
  linear-gradient(45deg, transparent 50%, gray 50%),
  linear-gradient(135deg, gray 50%, transparent 50%),
  linear-gradient(to right, #ccc, #ccc);
background-position:
  calc(100% - 20px) calc(1em + 2px),
  calc(100% - 15px) calc(1em + 2px),
  calc(100% - 2.5em) 0.5em;
background-size:
  5px 5px,
  5px 5px,
  1px 1.5em;
background-repeat: no-repeat;
}

select.minimal:focus {
background-image:
  linear-gradient(45deg, green 50%, transparent 50%),
  linear-gradient(135deg, transparent 50%, green 50%),
  linear-gradient(to right, #ccc, #ccc);
background-position:
  calc(100% - 15px) 1em,
  calc(100% - 20px) 1em,
  calc(100% - 2.5em) 0.5em;
background-size:
  5px 5px,
  5px 5px,
  1px 1.5em;
background-repeat: no-repeat;
border-color: green;
outline: 0;
}


select:-moz-focusring {
color: transparent;
text-shadow: 0 0 0 #000;
}

body {
background-color: #F0F8FF;
font: bold 1em/100% "Helvetica Neue", Arial, sans-serif;
padding: 2em 0;
text-align: center;
}
h1 {
color: white;
line-height: 120%;
margin: 0 auto 2rem auto;
max-width: 30rem;
}
.form-submit-button {
background: #0066A2;
color: white;
border-style: outset;
border-color: #0066A2;
height: 50px;
width: 100px;
font: bold 15px arial,sans-serif;
text-shadow: none;
border-radius : 20px;
border : none;
}
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