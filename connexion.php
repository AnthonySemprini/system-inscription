<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8;','root', 'root');//relie a la bdd
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    
<form method="POST" action="" align="center">

<input type="text" name="pseudo">
<br>
<input type="password" name="mdp">
<br><br>
<input type="submit" name="envoi">
</form>
</body>
</html>