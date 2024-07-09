<?php include('../../../actions/secure_admin.php') ?>
<?php 

    require_once('../../../actions/db.php');
    require_once('../../../actions/myFunctions.php');
    
    
    // Paramètres de pagination
    $nombre_par_page = 5; // Nombre d'éléments par page
    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1

    // Calculer le point de départ pour la requête SQL
    $offset = ($page_actuelle - 1) * $nombre_par_page;

    // Requête SQL pour récupérer les données paginées
    $sql = "SELECT * FROM tuser WHERE `PROFIL`!='ADMIN'ORDER BY ID DESC LIMIT :offset, :nombre_par_page";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':nombre_par_page', $nombre_par_page, PDO::PARAM_INT);
    $stmt->execute();

    
    // Requête pour compter le nombre total d'éléments
    $total_elements = $stmt->rowCount();

    // Calculer le nombre total de pages
    $nombre_de_pages = ceil($total_elements / $nombre_par_page);

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Utilisateurs</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../../assets/css/style.css?v=1.1">
</head>
<body>
    <div class="container-side">
        <?php include('../../layout/sidbar_admin.php') ?>
        <div class="content">
            <h2>Utilisateurs</h2>
            <button class="addbtn" id="addUser">
                <ion-icon name="add-circle-outline"></ion-icon>
                nouvel utilisateur
            </button>
            
            <div class="banner">
                <div class="form-box" id="form-user">
                    <form method="POST" action="../../../actions/create.php">
                        <input type="text" name="login" placeholder="Login" required>
                        <input type="text" name="nom" placeholder="Nom" required>

                        <input type="text" name="create" value="user" hidden>

                        <button type="submit" name="submit">Enregistrer</button>
                    </form>
                   
                </div>
                <?php if($total_elements== 0){?>
                    <div class="alert alert-info" role="alert">
                        Aucun user trouvé (<?= $total_elements; ?>)
                    </div>
                <?php }else { ?> 
                    <div class="table-box user">
                        <table>
                            <thead>
                                <tr>
                                    <th>LOGIN</th>
                                    <th>NOM</th>
                                    <th>ETAT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $count = 1;
                                    while($user=$stmt->fetch()) { ?> 
                            
                                    <tr>
                                        <td><?= $user['LOGIN'] ?></td>
                                        <td><?= $user['NOM'] ?></td>
                                        
                                        <?php if(($user['DCON'] != null) || ($user['DDISCON'] != null)) {

                                            if(($user['DCON'] != null) && ($user['DDISCON'] == null)){ ?> 

                                                <td> <span class="connected">connecté </span> <br><?= 'le '.dateFormatLong($user['DCON']) ?></td>

                                            <?php }elseif(($user['DCON'] != null) && ($user['DDISCON'] != null)) { ?>

                                                <td> 
                                                    <p><span class="connected">connecté </span> <br> <strong><?= 'le '.dateFormatLong($user['DCON']) ?></strong> </p>
                                                    <p><span class="disconnected">déconnecté </span> <br> <strong><?= 'le '.dateFormatLong($user['DDISCON']) ?></strong></p>
                                                </td>

                                            <?php } }else { ?>
                                                <td> Aucun état disponible</td>
                                            <?php } ?>  
                                        <td>
                                            <a href="../../../actions/delete.php?id=<?= $user['ID'] ?>&content=user" class="deleteBtn" onclick="return confirm('User en cours de suppression. OK ?')"> <ion-icon name="trash-outline"></ion-icon> Supprimer</a>
                                        </td>
                                    </tr>
                                
                                <?php } ?>
                            
                            </tbody>
                        </table>
                    </div>

                                  
                   <div class="pagination">
                        <?php for ($i = 1; $i <= $nombre_de_pages; $i++) : ?>
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endfor; ?>
                   </div>

                <?php } ?>
            </div>
            
        </div>
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../../../assets/js/user.js"></script>

    <?php include('../../../actions/alerts.php') ?>

    <script>
        const socket = new WebSocket('ws://localhost:8080');

        // Connection opened
        socket.addEventListener('open', (event) => {
            console.log('WebSocket connection opened:', event);
        });

        // Listen for messages
        socket.addEventListener('message', (event) => {
            console.log('Message from server:', event.data);
            // Rafraîchir la page ou mettre à jour les données selon vos besoins
            location.reload(true);
        });
    </script>

    <!--<script type="text/javascript">
        function table(){
            const xhttp = new XMLHttpRequest()
            xhttp.onload = function() {
                document.querySelector('.testtable').innerHTML = this.responseText
            }
            xhttp.open("GET", "utilisateur.php")
            xhttp.send()
        }
    </script>--->
</body>
</html>