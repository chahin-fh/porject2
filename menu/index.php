<?php
session_start();
include("../cnx.php");
$id = $_SESSION['id'];
$res = mysqli_query($cnx , "SELECT typ from personnes where id = '$id';");
$typ = mysqli_fetch_array($res)[0];
if($typ === "Etudiant"){
  echo"
    <!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack.css'>
    <link rel='stylesheet' href='style.css'>
    <script src='main.js'></script>
</head>
<style>
    p{
        text-align: center;
        color: #8254ff;
    }
    li{
        position: relative;
        left: 35%;
    }
</style>
<body>
    <h1>Menu</h1>
    <!-- Developed by http://grohit.com/ -->
    <div class='center'>
      <div class='btn-1'>
        <p>Affichage:</p>
        <a href='../affichage/index.php'><span>Affichage</span></a>
      </div>
      <div class='btn-1'>
        <p>Deconnexion:</p>
        <a href='../connexion/index.html'><span>Deconnexion</span></a>
    </div>
</body>
</html>
  ";
}else{
  echo"
  <!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='https://cdn.jsdelivr.net/npm/hack-font@3/build/web/hack.css'>
  <link rel='stylesheet' href='style.css'>
  <script src='main.js'></script>
</head>
<style>
  p{
      text-align: center;
      color: #8254ff;
  }
  li{
      position: relative;
      left: 35%;
  }
</style>
<body>
  <h1>Menu</h1>
  <!-- Developed by http://grohit.com/ -->
  <div class='center'>
    <div class='btn-1'>
      <p>Affichage:</p>
      <a href='../affichage/index.php'><span>Affichage</span></a>
    </div>
          <div class='btn-2'>
        <p>Notes:</p>
        <a href='../da5al notet/index.php'><span>Inserer les notes</span></a>
      </div>
    <div class='btn-1'>
      <p>Deconnexion:</p>
      <a href='../connexion/index.html'><span>Deconnexion</span></a>
  </div>
</body>
</html>
";
}
?>
