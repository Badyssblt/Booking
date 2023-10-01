<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css">
    <link rel="stylesheet" href="../css/reservation.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="../js/Scroll.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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
                    // DECLARATION VARIABLE GET AJAX
                    const reservation = response.get[0];
                    const image = reservation.image;
                    const title = reservation.nom;
                    const price = reservation.prix;
                    const chamber = reservation.chambre + (reservation.chambre > 1 ? " chambres" : " chambre");
                    const animal = reservation.animaux = 1 ? "Accepté" : "Non accepté";
                    const description = reservation.description;
                    const bed = reservation.chambre;
                    const coord = reservation.coordonne;
                    // INITIALISATION DE LA CARTE
                    initMap(coord);
                    // AJOUT VARIABLE GET DANS LE DOM
                    $("#sleep__content").prepend("<i class='fas fa-bed'></i>" + bed );
                    $("#description").html(description);
                    $(".chamber").html("<i class='fas fa-bed'></i>" + chamber)
                    $(".title").html(title);
                    $(".price").prepend(price);
                    $(".img").attr("src", image);
                    $('.animal').html("<i class='fas fa-cat'></i>" + animal);
                }
            });
            
        })
    </script>
    <script src="../js/Map.js"></script>

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
                <h2 style="font-family: 'Poppins'; color: white; padding-bottom: 5vh; margin: 30px">Réserver votre séjour maintenant.</h2>
                <div class="form">
                    <div class="form__description">
                        <div class="description slide">
                            <p id="description"></p>
                        </div>
                        <div class="sleep slide">
                            <p id="sleep">Moyen mis à disposition pour dormir</p>
                            <p id="sleep__content"> lits double</p>
                        </div>
                        <div class="comment slide">
                            <div class="item__comment">
                                <p class="author">Author</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, deleniti. Quod tempore enim vero ea architecto nesciunt! Eveniet maiores, id perspiciatis omnis vitae, fugit doloremque quia nesciunt, quos esse provident.</p>
                            </div>
                            <div class="item__comment slide">
                                <p class="author">Author</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, deleniti. Quod tempore enim vero ea architecto nesciunt! Eveniet maiores, id perspiciatis omnis vitae, fugit doloremque quia nesciunt, quos esse provident.</p>
                            </div>
                            <div class="item__comment">
                                <p class="author">Author</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, deleniti. Quod tempore enim vero ea architecto nesciunt! Eveniet maiores, id perspiciatis omnis vitae, fugit doloremque quia nesciunt, quos esse provident.</p>
                            </div>
                            <div class="item__comment">
                                <p>Author</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, deleniti. Quod tempore enim vero ea architecto nesciunt! Eveniet maiores, id perspiciatis omnis vitae, fugit doloremque quia nesciunt, quos esse provident.</p>
                            </div>
                        </div>
                        <div class="map" id="map">

                        </div>
                    </div>
                    <div class="form__content">
                        <form id="form" class="form__unfixed">
                            <p class="price"> € par nuit</p>
                            <div class="input-wrapper">
                                <label for="date_debut">date d'arrivée</label>
                                <input type="text" name="date_debut" id="datepicker">
                            </div>
                            <div class="input-wrapper">
                                <label for="date_fin">date de départ</label>
                                <input type="text" name="date_fin" id="datepicker">
                            </div>  
                            <input type="submit" value="Réserver">
                            <div class="day">
                                <p class="day__number"><span class="price"> €   x</span><span id="number"> nuits</span><span class="total"></span></p>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</body>
</html>
<script src="../js/Reservation.js"></script>
<script src="https://kit.fontawesome.com/c1cb64b22b.js" crossorigin="anonymous"></script>
<script>
    $(document).ready((e) => {
        // ENVOIE RESERVATION AJAX
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
