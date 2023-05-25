<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;','root', 'root');//relie a la bdd
if(!$_SESSION['mdp']){
    header('Location: connexionAdmin.php');
}

if(isset($_POST['envoi'])){
    if(!empty($_POST['titre'])AND !empty($_POST['contenu'])){ 
        $titre = htmlspecialchars($_POST['titre']);
        $contenu = nl2br(htmlspecialchars($_POST['contenu']));// permet de conserver les saut a la ligne 

        $insereArticle = $bdd->prepare('INSERT INTO articles(titre, contenu)VALUES(?, ?)');//insert dans la bdd
        $insereArticle->execute(array($titre, $contenu));
        echo "L'article a bien été envoyé ";
}else{
    echo "Veuillez completer tous les champs ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un article</title>
</head>
<body>
<nav>
        <a href="membres.php">Afficher tous les membres</a>
        <br>
        <a href="publier-article.php">Ajouter un article</a>
        <br>
        <a href="articles.php">Afficher les articles</a>
        <br>
        <a href="supprimer-articles.php">Supprimer articles</a>
        <br>
        <a href="modifier-articles.php">Modifier les articles</a>
        <br>
        <br>
        <a href="deconnexionAdmin.php"><button>Se deconnecter</button></a>
    </nav>
    <form method ="POST" action="">
        
        <input type="text" name="titre">
        <br>
        <textarea name="contenu" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" name="envoi">
    </form>
</body>
</html>