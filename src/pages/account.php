<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/account.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
</head>
<body>
    <?php require(__DIR__ . '/../components/header.php'); ?>
    <main>
        <div class="sidebar">
            <ul>
                <div class="profile">
                    <li class="nav__link" id="profile">Mon profil<i class="fas fa-plus"></i></li>
                    <ul style="display:none;" id="profile__list">
                        <li class="profile__item">Paramètre</li>
                        <li class="profile__item">Confidentialité</li>
                    </ul>
                </div>
                <div class="reservations">
                    <li class="nav__link" id="book">Mes réservations</li>
                    <ul style="display:none;" id="reservation__list">
                        <li id="progress" class="reservation__item">Mes réservations en cours</li>
                        <li id="done" class="reservation__item">Mes réservations terminées</li>
                    </ul>
                </div>
                <li class="nav__link" id="message">Messagerie</li>
                <li class="nav__link" id="help">Aide</li>
            </ul>
        </div>
        <div class="content">

        </div>
    </main>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/c1cb64b22b.js" crossorigin="anonymous"></script>
<script>
    function loadContent(url){
        $(".content").load(url);
    }

    function hideTabs(element){
        $(element).css("display", "none");
    }

    function displayTabs(element){
        $(element).css("display", "block")
    }

    $(document).ready(() => {
        $("#profile").click(function(){
            loadContent("../components/account/informations.php");
            hideTabs("#reservation__list");
            displayTabs("#profile__list");
        })
        $("#book").click(function(){
            loadContent("../components/account/book.php");
            hideTabs("#profile__list");
            displayTabs("#reservation__list");
        });

        $("#progress").click(function(){
            $('.content').load("../components/account/progress.php");
        });
        $("#done").click(function() {
            $('.content').load("../components/account/done.php");
        })
        $("#message").click(function() {
            $('.content').load("../components/account/message.php");
        })

    })
</script>

