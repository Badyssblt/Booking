<?php
session_start();
    require(__DIR__ . "/../../class/Reservation.php");
    require(__DIR__ . "/../../class/Db.php");
    $db = new Database("localhost", "root", "", "bookingfe");
    $resInstance = new Reservation($db);
    $res = $resInstance->getBookByuserID($_SESSION["ID"]);
?>
<div class="book__content">
    <h1 class="informations__title">Mes réservations en cours</h1>
    <div class="content">
        <p>Voici les réservations en cours</p>
        <div class="book_reservations">
            <?php
                foreach($res as $item){ 
                    $date_debut = strtotime($item["date_debut"]);
                    $date_fin = strtotime($item["date_fin"]);
                    ?>
                    <div class="item">
                        <img src="<?= $item["image"] ?>" alt="Image de la réservation">
                        <div class="item__info">
                            <p id="item__title"><?= $item["nom"] ?></p>
                            <p><?= $item["prix"] ?> € / nuit</p>
                            <p><?= date("d/m/Y", $date_debut); ?></p>
                            <p><?= date("d/m/Y", $date_fin) ?></p>
                        </div>
                    </div>
                <?php
                }
            ?>
        </div>
    </div>
</div>