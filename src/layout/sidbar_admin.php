<div class="sidebar-box">
    <div class="sidebar">
        <a href="./dashboard.php"> <ion-icon name="speedometer-outline"></ion-icon> <?= $_SESSION['ADMIN']['NOM'] ?></a>
        <hr>
        <a href="./utilisateur.php"><ion-icon name="person-outline"></ion-icon> utilisateur</a>
        <a href="./profil.php"> <ion-icon name="id-card-outline"></ion-icon> profil</a>
        <a href="./evenement.php"> <ion-icon name="newspaper-outline"></ion-icon>événement</a>
        <a href="./etat.php"> <ion-icon name="newspaper-outline"></ion-icon>état</a>

        <a href="../../../actions/logout.php" onclick="return confirm('Vous allez êtes déconnecter, OK ?')"> <ion-icon name="log-out-outline"></ion-icon>se déconnecter</a>
    </div>
</div>