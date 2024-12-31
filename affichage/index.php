<?php
include("../cnx.php");
$res = mysqli_query($cnx,"SELECT NM from matier");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    $res1 = mysqli_query($cnx , "SELECT n.exmen,n.cc,n.ds,n.notefinal,n.NF from matier as m , perssone as p , note as n where (p.id = m.id)and(p.classe='$cl')and(p.department = '$BR')and(m.NM = '$NM');");
        while($ligne = mysqli_fetch_array($res1)){
            echo"
                <style>
                    #elem1{
                        position:relative;
                        left:10%;
                        background-color: rgba(255,255,255,0.2);
                        color: black;
                    }
                    #elem2{
                        color: black;
                        position:relative;
                        left:15%;
                    }
                    #elem3{
                        color: black;
                        position:relative;
                        left:5%;
                    }
                    #elem4{
                        color: black;
                        position:relative;
                        left:9%;
                    }
                </style>
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
        $j = 0;
    // Loop through inputs and insert only non-empty pairs
    button1();
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
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <label for="">branch:</label>
        <select name="" id="">
            <option value="">--selectionner branch--</option>
            <option value="LT">LT</option>
            <option value="IOT">IOT</option>
            <option value="LM">LM</option>
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