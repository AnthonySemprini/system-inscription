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
   <a href="deconnexionAdmin.php"><button>Se deconnecter</button></a> 
   <a href="membres.php">Afficher tous les membres</a>
</body>
</html>