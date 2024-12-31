<?php
include("../cnx.php");
$res = mysqli_query($cnx,"SELECT NM from matier");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    $res1 = mysqli_query($cnx , "SELECT n.exmen,n.cc,n.ds,n.notefinal,n.NF from matier as m , perssone as p , note as n where (p.id = m.id)and(p.classe='$cl')and(p.department = '$BR')and(m.NM = '$NM');");
        while($ligne = mysqli_fetch_array($res1)){
            echo"
            <main>
                <table class='styled-table'>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>cc</th>
                    <th>ds</th>
                    <th>exeman</th>
                    <th>note final</th>
                </tr>
            </thead>
            <tbody>
                        <tr>
                            <td id=''>$ligne[0]</td>
                            <td id=''>$ligne[1]</td>
                            <td id=''>$ligne[2]</td>
                            <td id=''>$ligne[3]</td>
                            <td id=''>$ligne[4]</td>
                        </tr>
                    </tbody>
        </table>
        </main>
                    ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affiche</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
</head>
<body>
    <form onsubmit="" method="post">
        <label for="">classe:</label>
        <select name="" id="">
            <option value="">--selectionner class--</option>
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
        </select>
        <label for="">branch:</label>
        <select name="" id="">
            <option value="">--selectionner branch--</option>
            <option value="">LT</option>
            <option value="">IOT</option>
            <option value="">MD</option>
        </select>
        <label for="">matier:</label>
        <select name="" id="">
            <option value="">--selectionner matier--</option>
            <?php
                while($t = mysqli_fetch_array($res)){
                    echo"<option value=''>$t[0]</option>";
                }
            ?>
        </select>
        <input type="submit">
    </form>
</body>