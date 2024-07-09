<div class="sidebar-box">
    <div class="sidebar">
        <a href="./dashboard.php"> <ion-icon name="speedometer-outline"></ion-icon> <?= $_SESSION['USER']['NOM'] ?></a>
        <hr>
        <a href="./saisie.php"> <ion-icon name="clipboard-outline"></ion-icon>saisie</a>
        <a href="./evenement.php"> <ion-icon name="newspaper-outline"></ion-icon>événement</a>

        <a href="../../../actions/logout.php?profil=user&id=<?= $_SESSION['CCLI']['ID'] ?>" onclick="return confirm('Vous allez êtes déconnecter, OK ?')"> <ion-icon name="log-out-outline"></ion-icon>se déconnecter</a>
    </div>
</div>