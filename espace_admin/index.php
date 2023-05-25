<?php
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexionAdmin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <a href="membres.php">Afficher tous les membres</a>
    <br>
    <a href="publier-article.php">Ajouter un article</a>
    <br>
    <a href="deconnexionAdmin.php"><button>Se deconnecter</button></a> 
</body>
</html>