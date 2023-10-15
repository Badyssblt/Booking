<main>
    <div class="destinations__container">
        <?php
            require("../class/Db.php");
            $db = new Database("localhost", "root", "", "bookingfe");
            $stmt = $db->query("SELECT * FROM reservations");
            foreach($stmt as $item){ ?>
                <div class="destinations__items">
                    <div class="destinations__img__container">
                        <img src="<?= $item["image"] ?>" alt="">
                    </div>
                    <p class="items__title"><?= $item['nom'];  ?></p>
                    <p class="items__price"><?= $item["prix"] . " € / nuit"; ?></p>
                    <a class="items__link" href="/pages/reservations.php?id=<?= $item["ID"] ?>">Réserver</a>
                </div>
                <?php
            }

        ?>
    </div>
</main>