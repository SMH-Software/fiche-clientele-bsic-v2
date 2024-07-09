<?php
    session_start();

    if(isset($_GET['profil']) && isset($_GET['id'])){
        
        //Connexion avec la base de données
        require_once('./db.php');

        $id = $_GET['id'];
        $date = (new \DateTime())->format('Y-m-d H:i:s');

        $setEtat="UPDATE `tuser` SET `DDISCON`='$date' WHERE `ID`='$id'";
        $result=$pdo->prepare($setEtat);
        $result->execute();
    }

    session_destroy();
    header("location:../index.php");
?>