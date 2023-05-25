<?php
session_start();
if (!$_SESSION['mdp']) {
    header('Location: connexionAdmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Home</a>
            <br>
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
    </header>
    <div id="wrapper">
        <main>
            <div id="container">
                <h1>Admin version</h1>
                <?= $content ?>
            </div>
        </main>
    </div>

</body>

</html>