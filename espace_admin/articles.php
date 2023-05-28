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
    $recupArticles = $bdd = $bdd->query('SELECT *FROM articles');
    while($article = $recupArticles->fetch()){
        ?>
        <div class="article">
            <h1><?=$article['titre']; ?></h1>
            <p><?= $article['contenu']; ?></p>
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
