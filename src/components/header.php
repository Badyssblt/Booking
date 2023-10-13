<?php
session_start();
?>
<menu>
    <div class="menu__title">
        <li><a href="/" class="items" title="Accueil du site">BookingFE</a></li>
    </div>
    <div class="menu__content menu">
        <li><a href="" class="items" title="A propos du site">A propos de nous</a></li>
        <li><a href="/pages/discover.php" class="items" title="Découvrir des réservations">Découvrir</a></li>
    </div>
    <div class="menu__log menu">
        <?php
            if(isset($_SESSION['ID'])){?>
                <a href="../pages/account.php"><i class="fas fa-user" style="font-size: 1.25em"></i></a>
                <a href="../process/logout.php"><i class="fa fa-sign-out" style="font-size: 1.25em"></i></a>
            <?php
            }else { ?>
                <li class="menu__li"><a href="/pages/login.php" class="items signin" title="Se connecter">Se connecter</a></li>
                <li class="menu__li"><a href="/pages/register.php" class="items signup" title="S'inscrire">S'inscrire</a></li>
            <?php
            }
        ?>

    </div>
    
</menu>