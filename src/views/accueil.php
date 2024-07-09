<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSIC, Côte d'Ivoire | Accueil</title>
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../assets/css/accueil.css?v=1.1">
</head>
<body>
    <section class="container-box">
         
            <h1>Bienvenue à la banque bsic de côte d'ivoire</h1>
            <p class="text">veuillez vous identifier</p>
            
            <div class="box-element">
                <div class="box">
                    <img src="../../assets/img/cc1.png" alt="" onclick="window.location.href='connexion.php?content=chargé clientèle'">
                    <p>chargé clientèle</p>
                </div>

                <div class="box" onclick="window.location.href='connexion.php?content=organisateur'">
                    <img src="../../assets/img/org1.png" alt="">
                    <p>organisateur</p>
                </div>

                <div class="box" onclick="window.location.href='connexion.php?content=administrateur'">
                    <img src="../../assets/img/admin1.png" alt="">
                    <p>administrateur</p> 
                </div>
            </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>