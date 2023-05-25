<?php 
session_start();//ouvre nouvel session
$bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8;','root', 'root');//relie a la bdd
if(isset($_POST['envoi'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){//verifie si input sont vide
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);//encodage mdp
        $insertUsers = $bdd->prepare('INSERT INTO users(pseudo, mdp)VALUES(?, ?)');//insert dans la bdd
        $insertUsers->execute(array($pseudo, $mdp));

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));
        if($recupUser->rowCount() > 0){
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['id'] = $recupUser->fetch()['id'];//selectionne $recupUsser et fetch juste 'id' por recup l'ID
        }

        echo $_SESSION['id'];
    }else{
        echo "Veuillez completer tous les champs...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
<form method="POST" action="" align="center">
    <p>Pseudo : <input type="text" name="pseudo" autocomplete="off"></p>
    
    <p>Mot de passe : <input type="password" name="mdp" autocomplete="off"></p>
    
    <br><br>

    <input type="submit" name="envoi">
</form>
</body>
</html>