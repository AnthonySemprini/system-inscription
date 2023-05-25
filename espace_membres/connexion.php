<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8;','root', 'root');//relie a la bdd
if(isset($_POST['envoi'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

        $recuUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recuUser->execute(array($pseudo, $mdp));

        if($recuUser->rowCount() >0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recuUser->fetch()['id'];
            header('Location: index.php'); 

        }else{
            echo "Votre mot de passe ou pseudo est incorect ...";
        }
    }else{
        echo "Veuillez completer tous les champs ...";
    }
}
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
<br><a href="connexion.php"><button>Connexion</button></a>
    <br><a href="inscription.php"><button>Inscription</button></a>
    <br><a href="index.php"><button>Home</button></a>
    
<form method="POST" action="" align="center">

<input type="text" name="pseudo" autocomplete="off">
<br>
<input type="password" name="mdp" autocomplete="off">
<br><br>
<input type="submit" name="envoi">
</form>
</body>
</html>