<?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        //Connexion avec la base de données
        require_once('./db.php');

        //Récupération des champs de saisi (login et mot de pass) du formulaire
        $login = htmlspecialchars($_POST['login']);
        $mdp = htmlspecialchars($_POST['mdp']);

        //requette de vérification dans la base de donnée
        $connexion="SELECT * FROM tuser WHERE `LOGIN`='$login' AND `MDP`='$mdp'";
        $result=$pdo->prepare($connexion);
        $result->execute();

        //Vérification et redirection
        if($user=$result->fetch()){

           if($user['PROFIL'] == 'ADMIN'){
                $_SESSION['ADMIN'] = $user;
                header("location:../src/views/admin/dashboard.php");
           }elseif ($user['PROFIL'] == 'USER'){
                $date = (new \DateTime())->format('Y-m-d H:i:s');

                $setEtat="UPDATE `tuser` SET `DCON`='$date' WHERE `LOGIN`='$login'";
                $result=$pdo->prepare($setEtat);
                $result->execute();

                $_SESSION['USER'] = $user;
                header("location:../src/views/ccli/dashboard.php");
           }

        }else{ 

            //Message d'erreur si informations de connexion incorrectes
            $_SESSION['error'] = 'Login ou mot de passe incorrect';
            header("location:../index.php");
        }
        
       
    } 
?>