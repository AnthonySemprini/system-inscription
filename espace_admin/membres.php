<?php
ob_start();
?>
    <!--afficher tous les membres--> 
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=espace_admin;charset=utf8;','root', 'root');//relie a la bdd
        $recupUsers = $bdd->query('SELECT * FROM membres');
        while($user = $recupUsers->fetch()){
        ?>
        <p><?= $user['pseudo'];?><a href="bannir.php?id=<?= $user['id']; ?>" style="color:red;"> Bannir le membre</a></p>
        <?php
        }
    ?>
    <!--fin de afficher tous les membres-->
    <?php
$content = ob_get_clean();
require "template.php";
?>