<?php
ob_start();
?>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;','root', 'root');//relie a la bdd
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

    <form method ="POST" action="">
        
        <input type="text" name="titre">
        <br>
        <textarea name="contenu" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" name="envoi">
    </form>
    <?php
$content = ob_get_clean();
require "template.php";
?>