<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/reservation.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Page</title>
</head>
<body>
    <?php
        require(__DIR__ . '/../components/header.php');
    ?>
    <script>
        $(document).ready(()=>{
            const url = window.location.href;
            const params = new URLSearchParams(url);
            const id = <?= $_GET["id"] ?>;
            console.log(id);
            $.ajax({
                type: "GET",
                url: "../process/book.php",
                data: {id: id},
                dataType: "json",
                success: function (response) {
                    const reservation = response.get[0];
                    const image = reservation.image;
                    const title = reservation.nom;
                    const chamber = reservation.chambre + (reservation.chambre > 1 ? " chambres" : "chambre");
                    const animal = reservation.animaux = 1 ? "Accepté" : "Non accepté"
                    $(".chamber").html(chamber)
                    $(".title").html(title);
                    $(".img").attr("src", image);
                    $('.animal').html(animal);
                }
            });
        })
    </script>
    <main>
        <div class="content">
            <div class="img__container">
                <img src='' alt="" class="img">
            </div>
            <h1 class="title"></h1>
            <p class="chamber"></p>
            <p class="animal"></p>
        </div>
    </main>
</body>
</html>
<script src="https://kit.fontawesome.com/c1cb64b22b.js" crossorigin="anonymous"></script>
