<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher tous les articles</title>
</head>
<body>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;','root', 'root');//relie a la bdd
    $recupArticles = $bdd = $bdd->query('SELECT *FROM articles');//recup dans la bdd
    while($article = $recupArticles->fetch()){// boucle while 
        ?>
        <div class="article">
            <h1><?=$article['titre']; ?></h1><!--affiche titre-->
            <p><?= $article['contenu']; ?></p><!--affiche contenu-->
            <a href="supprimer-articles.php?id=<?= $article['id']; ?>">
            <button style="color :red;" >Supprimer article</button>
            </a>
            <a href="modifier-articles.php?id=<?= $article['id']; ?>">
            <button style="color :green;" >Modifier article</button>
            </a>
        </div>
    <?php
    }
    ?>
</body>
</html>
<?php
$content = ob_get_clean();
require "template.php";
?>
