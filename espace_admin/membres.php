<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;','root', 'root');//relie a la bdd
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
    <title>Afficher les membres</title>
</head>
<body>
    <!--afficher tous les membres--> 
    <?php
        $recupUsers = $bdd->query('SELECT * FROM membres');
        while($user = $recupUsers->fetch()){
        ?>
        <p><?= $user['pseudo'];?><a href="bannir.php?id=<?= $user['id']; ?>" style="color:red;"> Bannir le membre</a></p>
        <?php
        }
    ?>
    <!--fin de afficher tous les membres-->
</body>
</html>