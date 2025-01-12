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
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="classe">Classe:</label>
        <select name="classe" id="classe">
            <option value="">Select a class</option>
            <?php
            include("../cnx.php");
            $classes_res = mysqli_query($cnx, "SELECT DISTINCT niveau_etud FROM personne");
            while ($row = mysqli_fetch_assoc($classes_res)) {
                echo '<option value="' . htmlspecialchars($row['niveau_etud']) . '">' . htmlspecialchars($row['niveau_etud']) . '</option>';
            }
            mysqli_free_result($classes_res);
            ?>
        </select>        
        <label for="nom">Nom:</label>
        <select name="nom" id="nom">
            <option value="">Select a name</option>
            <?php
            $names_res = mysqli_query($cnx, "SELECT DISTINCT nom FROM personne");
            while ($row = mysqli_fetch_assoc($names_res)) {
                echo '<option value="' . htmlspecialchars($row['nom']) . '">' . htmlspecialchars($row['nom']) . '</option>';
            }
            mysqli_free_result($names_res);
            mysqli_close($cnx);
            ?>
        </select>
        
        <input type="submit" value="Select">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("../cnx.php");
        $classe = $_POST['classe'];
        $res = mysqli_query($cnx, "SELECT nom FROM personne WHERE niveau_etud = '$classe'");
        if ($res) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<li>" . htmlspecialchars($row['nom']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Error: " . mysqli_error($cnx);
        }
        mysqli_close($cnx);
    }
    ?>
</body>
</html>
