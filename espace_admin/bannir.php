<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;','root', 'root');//relie a la bdd
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $recuUser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $recuUser->execute(array($getId));
    if($recuUser->rowCount() > 0){

        $bannirUser = $bdd->prepare('DELETE FROM membres WHERE id = ?');//delete le membres de la bdd SQL
        $bannirUser->execute(array($getId));
        header('Location: membres.php');
    }else{
        echo "Aucun membres n'a été trouvé";
    }
}else{
    echo "L'identifiant n'a pas été récupéré ";
}