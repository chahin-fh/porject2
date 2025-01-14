<?php
include("../cnx.php");

// Handle the first form submission (to generate the table)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] == 'form1') {
    $classe = $_POST['classe'];
    $NM = $_POST['NM'];
    echo"<style>
    #f1{
        display : none;
}
    </style>";
    echo"
        <style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

table {
    border-collapse: collapse;
    width: 80%;
    max-width: 800px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    padding: 12px 15px;
    text-align: left;
}

th {
    background-color: #007BFF;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

td {
    font-size: 14px;
    color: #333;
}</style>
    ";
    echo "
    <form method='post' id = 'f2'>
       <input type='hidden' name='form_type' value='form2'>
       <input type='hidden' name='NM' value='$NM'>
       <table>
           <thead>
               <tr>
                   <th>Name</th>
                   <th>DS</th>
                   <th>Exemen</th>
                   <th>CC</th>
                   <th>NF</th>
               </tr>
           </thead>";
    
    $res = mysqli_query($cnx, "SELECT nom FROM personnes WHERE classe ='$classe';");
    $counter = 0;
    while ($t = mysqli_fetch_array($res)) {
        echo "
           <tbody>
               <tr>
                   <td><input type='hidden' name='name[$counter]' value='$t[0]'>$t[0]</td>
                   <td><input type='number' name='ds[$counter]' required></td>
                   <td><input type='number' name='exemen[$counter]' required></td>
                   <td><input type='number' name='cc[$counter]' required></td>
                   <td><input type='number' name='nf[$counter]' required></td>
               </tr>
           </tbody>";
        $counter++;
    }

    echo "</table>
          <input type='submit' value='Submit'>
    </form>";

    mysqli_close($cnx);
}

// Handle the second form submission (to insert data into the database)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] == 'form2') {
    $NM = $_POST['NM'];
    $res1 = mysqli_query($cnx, "SELECT QF FROM matier WHERE NM = '$NM'");
    $QF = mysqli_fetch_array($res1)[0];

    foreach ($_POST['name'] as $index => $name) {
        $ds = $_POST['ds'][$index];
        $exemen = $_POST['exemen'][$index];
        $cc = $_POST['cc'][$index];
        $nf = $_POST['nf'][$index];

        if (is_numeric($ds) && is_numeric($exemen) && is_numeric($cc) && is_numeric($nf)) {
            $ds = mysqli_real_escape_string($cnx, $ds);
            $exemen = mysqli_real_escape_string($cnx, $exemen);
            $cc = mysqli_real_escape_string($cnx, $cc);
            $nf = mysqli_real_escape_string($cnx, $nf);
            $name = mysqli_real_escape_string($cnx, $name);

            $query = "INSERT INTO note (nomE, ds, exmen, cc, nf, NM, QF) VALUES ('$name', '$ds', '$exemen', '$cc', '$nf', '$NM', '$QF')";
            mysqli_query($cnx, $query) or die("Error: " . mysqli_error($cnx));
        }
    }
    echo "Data inserted successfully!";
    mysqli_close($cnx);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiche</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body>
<form method="post" onsubmit="return verif()" id="f1">
    <input type="hidden" name="form_type" value="form1">
    <label for="classe">Classe:</label>
    <select name="classe" id="classe" required>
        <option value="">Select a class</option>
        <?php
            $classes_res = mysqli_query($cnx, "SELECT DISTINCT classe FROM personnes");
            while ($row = mysqli_fetch_assoc($classes_res)) {
                echo '<option value="' . htmlspecialchars($row['classe']) . '">' . htmlspecialchars($row['classe']) . '</option>';
            }
            mysqli_free_result($classes_res);
        ?>
    </select>
    <label for="NM">NM:</label>
    <select name="NM" id="NM" required>
        <option value="">Select a name</option>
        <?php
            $names_res = mysqli_query($cnx, "SELECT DISTINCT NM FROM matier");
            while ($row = mysqli_fetch_array($names_res)) {
                echo "<option value='$row[0]'>$row[0]</option>";
            }
            mysqli_free_result($names_res);
        ?>
    </select>
    <input type="submit" value="submit">
</form>
<br><br>
</body>
</html>
