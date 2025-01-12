<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include("../cnx.php");
    if (!$cnx) {
        die("Erreur de connexion à la base de données: " . mysqli_connect_error());
    }
    extract($_POST);
    if ($type == "professeur") {
        $academic_title = mysqli_real_escape_string($cnx, $_POST["academic_title"]);
        $hire_date = mysqli_real_escape_string($cnx, $_POST["hire_date"]);
        $password = mysqli_real_escape_string($cnx, $_POST["password"]);
        $stmt = $cnx->prepare("INSERT INTO personnes (typ, nom, email, num_tell, adress, ville, code_p, paye, department, titre, date_deb, pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Erreur lors de la préparation de la requête: " . mysqli_error($cnx));
        }
        $stmt->bind_param("ssssssssssss", $type, $name, $email, $phone, $address, $city, $postal_code, $country, $department, $academic_title, $hire_date, $password);
    } elseif ($type == "etudiant") {
        $date_of_birth = mysqli_real_escape_string($cnx, $_POST["date_of_birth"]);
        $academic_level = mysqli_real_escape_string($cnx, $_POST["academic_level"]);
        $enrollment_date = date("Y-m-d");
        $res = mysqli_query($cnx,"SELECT count(classe) from personnes;");
        $j = mysqli_fetch_array($res)[0];
        $c = 1;
        if($j % 20 === 0 ){
            $c = $j / 20;
        }else {
            $c = floor($j);
        }
        $c = (string) $c;
        $a = (string) $academic_level;
        $classe = $a . $department . $c;
        $stmt = $cnx->prepare("INSERT INTO personnes (typ, nom, email, num_tell, adress, ville, code_p, paye, department, date_nais, niveau_etud, date_inscrit,classe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?);");
        if ($stmt === false) {
            die("Erreur lors de la préparation de la requête: " . mysqli_error($cnx));
        }
        $stmt->bind_param("ssssssssssss", $type, $name, $email, $phone, $address, $city, $postal_code, $country, $department, $date_of_birth, $academic_level, $enrollment_date ,$classe);
    } else {
        echo "<script>alert('Veuillez spécifier votre type');</script>";
        exit;
    }
    if ($stmt->execute()) {
        if ($type == "professeur") {
            echo "<script>alert('Professeur ajouté');</script>";
        } else {
            echo "<script>alert('Etudiant ajouté');</script>";
        }
    } else {
        echo "Erreur: " . $stmt->error;
    }
    sleep(1);
    header("Location: ../connexion/index.html");
    $stmt->close();
    mysqli_close($cnx);
}
?>
<?php

$cnx = mysqli_connect("127.0.0.1","root","","ifbreak");
$req5 = "insert into personne (passe,nom,mail,monnaire) values('$mp','$nom','$email','$flous');" or die("probelm l4") ;
$res9 = mysqli_query($cnx,$req5) or die("problim ins");
$nb5 = mysqli_affected_rows($cnx);
sleep(1);
header("location:../connexion/index.html");
mysqli_close($cnx);
?>
