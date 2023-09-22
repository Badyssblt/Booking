<?php
require(__DIR__ . './class/Db.php');
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
                <h1 class="hero__title__h1">Louer un séjour <br/>dans l'endroit de vos rêves</h1>
                <div class="hero__title__info">
                    <span class="hero__title__span">Explorer des pays, régions <br/> aux prix les plus justes.</span>
                    <a href="#" class="hero__title__a">Découvrir</a>
                </div>
                
            </div>
            <div class="hero__banner">
                <div class="hero__background">

                </div>
                <div class="hero__img__container">
                    <img src="./public/images/heroBanner.png" alt="Image">
                </div>
            </div>
        </div>
        <div class="destinations__container">
            
        </div>
    </main>
</body>
</html>