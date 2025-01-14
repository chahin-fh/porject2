<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include("../cnx.php");
        $classe = $_POST['classe'];
        if (!empty($classe)) {
            $res = mysqli_query($cnx, "SELECT nom FROM personnes WHERE niveau_etud = '$classe'");
            if ($res) {
                echo "<ul>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<li>" . htmlspecialchars($row['nom']) . "</li>";
                }
                echo "</ul>";
                mysqli_free_result($res);
            } else {
                echo "Error: " . mysqli_error($cnx);
            }
        } else {
            echo "Please select a class.";
        }
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return verif()">
        <label for="classe">Classe:</label>
        <select name="classe" id="classe">
            <option value="">Select a class</option>
            <?php
                include("../cnx.php");
                $classes_res = mysqli_query($cnx, "SELECT DISTINCT classe FROM personnes");
                while ($row = mysqli_fetch_assoc($classes_res)) {
                    echo '<option value="' . htmlspecialchars($row['classe']) . '">' . htmlspecialchars($row['classe']) . '</option>';
                }
                mysqli_free_result($classes_res);
                mysqli_close($cnx);
            ?>
        </select>        
        <label for="nom">Nom:</label>
        <select name="nom" id="nom">
            <option value="">Select a name</option>
            <?php
                include("../cnx.php");
                $classe = $_POST['classe'];
                $names_res = mysqli_query($cnx, "SELECT DISTINCT nom FROM personnes");
                while ($row = mysqli_fetch_assoc($names_res)) {
                    echo '<option value="' . htmlspecialchars($row['nom']) . '">' . htmlspecialchars($row['nom']) . '</option>';
                }
                mysqli_free_result($names_res);
                mysqli_close($cnx);
            ?>
        </select>
        <input type="submit" value="Select">
    </form>
    <?php echo ob_get_clean(); ?>

</body>
</html>
