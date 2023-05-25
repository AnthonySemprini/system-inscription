<?php
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexionAdmin.php');
}
?>