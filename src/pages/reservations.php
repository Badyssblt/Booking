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
            $.ajax({
                type: "GET",
                url: "../process/book.php",
                data: {id: id},
                dataType: "json",
                success: function (response) {
                    const reservation = response.get[0];
                    const image = reservation.image;
                    const title = reservation.nom;
                    const price = reservation.prix;
                    const chamber = reservation.chambre + (reservation.chambre > 1 ? " chambres" : " chambre");
                    const animal = reservation.animaux = 1 ? "Accepté" : "Non accepté"
                    $(".chamber").html("<i class='fas fa-bed'></i>" + chamber)
                    $(".title").html(title);
                    $(".price").prepend(price);
                    $(".img").attr("src", image);
                    $('.animal').html("<i class='fas fa-cat'></i>" + animal);
                }
            });
        })
    </script>
    <main>
        <div class="content">
            <div class="img__container">
                <img src='' alt="" class="img">
            </div>
            <div class="content__info">
                <h1 class="title"></h1>
                <div class="info">
                    <p class="chamber"></p>
                    <p class="animal"></p>
                </div>
                <div class="form">
                    <h2 style="font-family: 'Poppins'; color: white">Réserver votre séjour maintenant.</h2>
                    <div class="form__content">
                        <form id="form" >
                            <p class="price"></p>
                            <div class="input-wrapper">
                                <label for="date_debut">date d'arrivée</label>
                                <input type="date" name="date_debut" id="date_debut">
                            </div>
                            <div class="input-wrapper">
                                <label for="date_fin">date de départ</label>
                                <input type="date" name="date_fin" id="date_fin">
                            </div>  
                            <input type="submit" value="Réserver">
                            <div class="day">
                                <p class="day__number"><span class="price"></span><span id="number"></span><span class="total"></span></p>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="../js/Reservation.js"></script>
<script src="https://kit.fontawesome.com/c1cb64b22b.js" crossorigin="anonymous"></script>
<script>
    $(document).ready((e) => {
        $("#form").submit(function (e) { 
            e.preventDefault();
            const userID = <?= $_SESSION['ID']; ?>;
            const reservationID = <?= $_GET['id']; ?>;
            const date_debut = $("#date_debut").val();
            const date_fin = $("#date_fin").val();
            if(userID){
                $.ajax({
                    type: "POST",
                    url: "../process/createBook.php",
                    data: {
                        userID: userID,
                        reservationID: reservationID,
                        date_debut: date_debut,
                        date_fin: date_fin
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                    }
                });
            }
            
        });
    })
</script>
