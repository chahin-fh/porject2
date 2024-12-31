<?php
include("../cnx.php");
$res = mysqli_query($cnx,"SELECT NM from matier");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    $res1 = mysqli_query($cnx , "SELECT n.exmen,n.cc,n.ds,n.notefinal,n.NF from matier as m , perssone as p , note as n where (p.id = m.id)and(p.classe='$cl')and(p.department = '$BR')and(m.NM = '$NM');");
    function button1($arr,$cnx,$j,$arp){
        while($ligne = mysqli_fetch_array($res)){
            echo"
                <style>
            /* Style de base pour les éléments */
            .elem {
                position: relative;
                color: black;
                background-color: rgba(255, 255, 255, 0.2);
                padding: 10px;
                margin: 10px 0;
                border-radius: 8px;
            }

            /* Styles spécifiques pour chaque élément */
            .elem1 {
                left: 10%;
            }

            .elem2 {
                left: 15%;
            }

            .elem3 {
                left: 5%;
            }

            .elem4 {
                left: 9%;
            }
            
            /* Disposition Flexbox */
            .container {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            /* Responsive Design */
            @media (max-width: 600px) {
                .elem {
                    left: 0;
                    width: 100%;
                }
            }
        </style>

                    <tbody>
                        <tr>
                            <td id='elem1'>$ligne[0]</td>
                            <td id='elem2'>$ligne[1]</td>
                            <td id='elem3'>$ligne[2]</td>
                            <td id='elem4'>$ligne[3]</td>
                            <td id='elem4'>$ligne[4]</td>
                        </tr>
                    </tbody>";
        }
    }
        $j = 0;
    button1();
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
        </table>
    </main>
</body>