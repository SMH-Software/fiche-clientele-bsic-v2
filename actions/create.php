<?php
    session_start();
    // Gestion du formulaire "profil"
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        if(isset($_POST["create"])) {
            
            require_once('./db.php');

            if($_POST["create"] === "profil"){
             
                $no = htmlspecialchars($_POST['no']);
                $pro = htmlspecialchars($_POST['pro']);
                $expl = htmlspecialchars($_POST['expl']);

                $create="INSERT INTO `tprofil` (`no`, `pro`, `expl`) VALUES (?,?,?)";
                $params=array($no,$pro,$expl);
                $result=$pdo->prepare($create);
                $result->execute($params);
               
                $_SESSION['success'] = 'Nouveau profil ajouté avec success';
                header("location:../src/views/profil.php");

            }elseif($_POST["create"] === "user") {

                $login = htmlspecialchars($_POST['login']);
                $nom = htmlspecialchars($_POST['nom']);

                $set_mdp = str_shuffle($login.rand(0,99999));
                $mdp = strtolower(substr($set_mdp, 0, 8));

                $create="INSERT INTO `tuser` (`LOGIN`, `NOM`, `MDP`) VALUES (?,?,?)";
                $params=array($login,$nom,$mdp);
                $result=$pdo->prepare($create);
                $result->execute($params);
               
                $_SESSION['success'] = 'Nouveau user ajouté avec success';
                header("location:../src/views/admin/utilisateur.php");

            }elseif($_POST["create"] === "saisie") {

                $eventement = htmlspecialchars($_POST['neve']);
                $tclient = htmlspecialchars($_POST['tclient']);
                $nom_prenom = htmlspecialchars($_POST['nom_prenom']);
                $numCompte = htmlspecialchars($_POST['numCompte']);
                $email = htmlspecialchars($_POST['email']);
                $tel = htmlspecialchars($_POST['tel']);
                $date = (new \DateTime())->format('Y-m-d H:i:s');
                $expl = htmlspecialchars($_POST['expl']);
                $detailEven = htmlspecialchars($_POST['detailEven']);

                
                $create="INSERT INTO `teve` (`NEVE`, `TCLI`, `NOM_PRENOM`, `NCP`, `EMAIL`, `TEL`, `DCO`, `EXPL`, `DET`) VALUES (?,?,?,?,?,?,?,?,?)";
                $params=array($eventement,$tclient,$nom_prenom,$numCompte,$email,$tel,$date,$expl,$detailEven);
                $result=$pdo->prepare($create);
                $result->execute($params);
               
                $_SESSION['success'] = 'Nouvelle saisie ajoutée avec success';
                header("location:../src/views/saisie.php");

            }elseif($_POST["create"] === "etat") {

                $no = htmlspecialchars($_POST['no']);
                $pro = htmlspecialchars($_POST['pro']);
                $expl = htmlspecialchars($_POST['expl']);
                $etat = htmlspecialchars($_POST['etat']);

                
                $create="INSERT INTO `tetat` (`no`, `pro`, `expl` , `etat`) VALUES (?,?,?,?)";
                $params=array($no,$pro,$expl,$etat);
                $result=$pdo->prepare($create);
                $result->execute($params);
               
                $_SESSION['success'] = 'Nouvel état ajouté avec success';
                header("location:../src/views/etat.php");

            }

            
        }
        
    } 
?>