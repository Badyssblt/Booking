<?php
require(__DIR__ . './class/Db.php');
$db = new Database("localhost", "root", "", "bookingfe");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/reset.css">
    <title>Accueil</title>
</head>
<body>
    <?php require_once(__DIR__ . './components/header.php'); ?>
    <main>
        <div class="hero">
            <div class="hero__title">
                <h1 class="hero__title__h1">Louer un séjour <br/>dans l'endroit de vos </br>rêves</h1>
                <div class="hero__title__info">
                    <span class="hero__title__span">Explorer des pays, régions <br/> aux prix les plus justes.</span>
                    <a href="#" class="hero__title__a">Découvrir</a>
                </div>
            </div>
            <div class="hero__banner">
                <div class="hero__img__container">
                    <img src="./public/images/heroBanner.png" alt="Image">
                    <div class="hero__background"></div>
                </div>
            </div>
        </div>
        <div class="recommands">
            <p class="destinations__title">Nos recommendations</p>
            <div class="destinations__container">
                <?php
                    $stmt = $db->query("SELECT * FROM reservations LIMIT 4");
                    if($stmt){
                        foreach($stmt as $item){ ?>
                            <div class="destinations__items">
                                <div class="destinations__img__container">
                                    <img src="<?= $item["image"] ?>" alt="">
                                </div>
                                <p class="items__title"><?= $item['nom'];  ?></p>
                                <p class="items__price"><?= $item["prix"] . " € / nuit"; ?></p>
                                <a class="items__link" href="./pages/reservations.php?id=<?= $item["ID"] ?>">Réserver</a>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="house">
            <p class="destinations__title paragraph">Maisons</p>
            <div class="destinations__container">
                <?php
                $sql = "SELECT * FROM reservations INNER JOIN category ON reservations.ID = category.ID WHERE category.name = 'Maison' LIMIT 4";
                    $stmt = $db->query($sql);
                    if($stmt){
                        foreach($stmt as $item){ ?>
                            <div class="destinations__items">
                                <div class="destinations__img__container">
                                    <img src="<?= $item["image"] ?>" alt="">
                                </div>
                                <p class="items__title"><?= $item['nom'];  ?></p>
                                <p class="items__price"><?= $item["prix"] . " € / nuit"; ?></p>
                                <a class="items__link" href="./pages/reservations.php?id=<?= $item["ID"] ?>">Réserver</a>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        
    </main>
    <?php require("./components/footer.php"); ?>
    <script src="https://kit.fontawesome.com/c1cb64b22b.js" crossorigin="anonymous"></script>
</body>
</html>
