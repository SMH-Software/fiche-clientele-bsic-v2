<?php

    session_start();

    if(isset($_REQUEST['id']) && isset($_REQUEST['content']) ){

        $id = $_REQUEST['id'];

        require_once('./db.php');

        if($_REQUEST['content'] === "profil"){

            $delete="DELETE FROM `tprofil` WHERE ID='$id'";
            $result=$pdo->prepare($delete);
            $result->execute();

            $_SESSION['success'] = "Profil supprimé avec succès !";
            header("location:../src/profil.php");

        }elseif($_REQUEST['content'] === "user"){
            $delete="DELETE FROM `tuser` WHERE ID='$id'";
            $result=$pdo->prepare($delete);
            $result->execute();

            $_SESSION['success'] = "User supprimé avec succès !";
            header("location:../src/views/user.php");

        }elseif($_REQUEST['content'] === "saisie"){
            $delete="DELETE FROM `teve` WHERE ID='$id'";
            $result=$pdo->prepare($delete);
            $result->execute();

            $_SESSION['success'] = "Saisie supprimée avec succès !";
            header("location:../src/views/etat.php");

        }
               
    }

?>