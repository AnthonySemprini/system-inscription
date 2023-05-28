<?php
ob_start();
?>
<?php
 $bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;','root', 'root');//relie a la bdd
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getID = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id = ?');//recup id dans bdd
    $recupArticle->execute(array($getID));
    if($recupArticle->rowCount() > 0){
        $deleteArticle =$bdd->prepare('DELETE FROM articles WHERE id = ?');// efface article dans bdd grace a l'ID
        $deleteArticle->execute(array($getID));
        header('Location: articles.php');
    }else{
        echo "Aucun article trouvé";
    }
}else{
    echo "Aucun identifiant trouvé";
}

?>
<?php
$content = ob_get_clean();
require "template.php";
?>