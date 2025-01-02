<?php
include("../cnx.php");
$res = mysqli_query($cnx,"SELECT NM from matier");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cl = $_POST['classe'];
    $BR = $_POST['branch'];
    $NM = $_POST['matier'];
    $res1 = mysqli_query($cnx , "SELECT n.exmen, n.cc, n.ds, n.notefinal, n.NF FROM matier AS m, personnes AS p, note AS n WHERE (p.id = n.personne_id) AND (p.classe = '$cl') AND (p.department = '$BR') AND (m.NM = '$NM');");    
    while($ligne = mysqli_fetch_array($res1)) {
        echo "
            <style>
                body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    color: #333;
    margin: 0;
    padding: 0;
}

form {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}
select, input[type='submit'] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
input[type='submit'] {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
}
input[type='submit']:hover {
    background-color: #45a049;
}
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
th, td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}
th {
    background-color: #f2f2f2;
}
tr:hover {
    background-color: #f1f1f1;
}
#elem1, #elem2, #elem3, #elem4 {
    color: black;
    background-color: rgba(255, 255, 255, 0.2);
}
#elem1 {
    position: relative;
    left: 10%;
}
#elem2 {
    position: relative;
    left: 15%;
}
#elem3 {
    position: relative;
    left: 5%;
}
#elem4 {
    position: relative;
    left: 9%;
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
                </tbody>
        </table> <!-- Fermeture de la table -->
        </main>
        ";
    }
    $j = 0;
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
        <label for="classe">classe:</label>
        <select name="classe" id="classe">
            <option value="">--selectionner class--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <label for="branch">branch:</label>
        <select name="branch" id="branch">
            <option value="">--selectionner branch--</option>
            <option value="LT">LT</option>
            <option value="IOT">IOT</option>
            <option value="LM">LM</option>
        </select>
        <label for="matier">matier:</label>
        <select name="matier" id="matier">
            <option value="">--selectionner matier--</option>
            <?php
                while($t = mysqli_fetch_array($res)) {
                    echo "<option value='".$t[0]."'>".$t[0]."</option>";
                }
            ?>
        </select>
        <input type="submit">
    </form>
</body>
</html>
