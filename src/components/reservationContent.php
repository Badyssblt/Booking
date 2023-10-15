<?php
session_start();
?>
<script>
    function sendMessage(recipientId) {
            let message = $("#messageContent").val();
            const author = <?php echo isset($_SESSION['ID']) ? $_SESSION['ID'] : 'null'; ?>;;
            let recipient = recipientId;
            $.ajax({
                type: "POST",
                url: "../../process/sendMessage",
                data: 
                {
                    message: message,
                    author: author,
                    recipient: recipient    
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (jqXHR){
                    console.log(jqXHR);
                }
            });
    }
    $(document).ready(()=>{
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const id = urlParams.get('id');
            let price;
            let title;
            let date_debut;
            let date_fin;
            $.ajax({
                type: "GET",
                url: "../process/book.php",
                data: {id: id},
                dataType: "json",
                success: function (response) {
                    // DECLARATION VARIABLE GET AJAX
                    const reservation = response.get[0];
                    const image = reservation.image;
                    title = reservation.nom;
                    price = reservation.prix;
                    const chamber = reservation.chambre + (reservation.chambre > 1 ? " chambres" : " chambre");
                    const animal = reservation.animaux = 1 ? "Accepté" : "Non accepté";
                    const description = reservation.description;
                    const bed = reservation.chambre;
                    const coord = reservation.coordonne;
                    const ID = reservation.ID;
                    userID = reservation.userID;
                    calculTotal(price);
                    // INITIALISATION DE LA CARTE
                    initMap(coord);
                    // AJOUT VARIABLE GET DANS LE DOM
                    $("#sleep__content").prepend("<i class='fas fa-bed'></i>" + bed );
                    $("#reservationID").val(ID);
                    $("#description").html(description);
                    $(".chamber").html("<i class='fas fa-bed'></i>" + chamber)
                    $(".title").html(title);
                    $(".price").prepend(price);
                    $(".img").attr("src", image);
                    $('#message').attr('data-recipientID', userID);
                    $('.animal').html("<i class='fas fa-cat'></i>" + animal);
                    createInput(calculTotal(price), title);
                    let sql = "SELECT name FROM users WHERE ID = '" + userID + "'";
                    $.ajax({
                        type: "GET",
                        url: "../../process/getInfo.php",
                        data: {
                            sql: sql
                        },
                        dataType: "JSON",
                        success: function (response) {
                            let name = response[0];
                            $("#name").text(name.name);
                        },error: function(jqXHR){
                            console.log(jqXHR);
                        }
                    });
                
                }   
            });
            $("#message__form").submit((e) => {
                e.preventDefault();     
                sendMessage(userID);
            });
            let clicked = false;
            $("#message").click((e) => {
                e.preventDefault()
                if(!clicked){
                    $(".messages__content").css("display", "block");
                    $('html, body').css({
                        overflow: 'hidden',
                        height: '100%'
                    });
                    clicked = true;
                }
            });
            $('#close').click(() => {
                if(clicked){
                    $(".messages__content").css("display", "none");
                    $('html, body').css({
                        overflow: 'auto',
                        height: 'auto'
                    });
                    clicked = false;
                }
            })
            $(".datepicker").datepicker({
            dayNamesMin: ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"],
            dateFormat: "dd-mm-yy",
            onSelect: function(){
                calculerDifference();
                calculTotal(price);
            }
    });

        })
</script>
<div class="content">
    <div class="messages__content" style="display: none;">
        <p id="close"><i class="fa fa-close"></i></p>
        <form id="message__form">
            <p>Discutez avec <span id="name"></span></p>
            <input type="text" name="message" id="messageContent" placeholder="Entrer votre message..." autocomplete='off'>
            <input type="submit" value="Envoyer" id="submitBtn">
        </form>
    </div>
            <div class="img__container">
                <img src='' alt="" class="img">
            </div>
            <div class="content__info">
                <h1 class="title"></h1>
                <div class="info">
                    <p class="chamber"></p>
                    <p class="animal"></p>
                </div>
                <h2 style="font-family: 'Poppins'; color: white; padding-bottom: 5vh; margin: 30px" class="span">Réserver votre séjour maintenant.</h2>
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
                        <form id="form" class="form__unfixed" action="../process/createBook.php" method='POST'>
                            <p class="price"> € par nuit</p>
                            <input type="hidden" name="title" id="titles">
                            <input type="hidden" name="id" id="reservationID">
                            <div id="inputs-wrapper">
                                <div class="input-wrapper">
                                    <label for="date_debut">date d'arrivée</label>
                                    <input type="text" name="date_debut" class="datepicker" id="date_debut" autocomplete='off' readonly="readonly">
                                </div>
                                <div class="input-wrapper">
                                    <label for="date_fin">date de départ</label>
                                    <input type="text" name="date_fin" class="datepicker" id="date_fin" autocomplete="off">
                                </div>  
                            </div>
                            <input type="hidden" name="price" id="price">
                            <input type="submit" value="Réserver">
                            <button data-recipientID="" id="message">Envoyer un message </button>
                            <div class="date__errors"></div>
                            <div class="day">
                                <p class="day__number"><span class="price"> €   x</span><span id="number"> nuits</span><span class="total"></span></p>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
<script>
    $(document).ready(() => {
        function isDateValid(){
            let dateDebut = $("#date_debut").datepicker("getDate");
            let dateFin = $("#date_fin").datepicker("getDate");

            if(dateDebut >= dateFin){
                $(".date__errors").css('display', "block");
                $(".date__errors").text('Veuillez entrer des dates valides');
            }else {
                return true;
            }
        }

        $("#form").submit(function (e) {
            e.preventDefault();

            if(isDateValid()){
                this.submit();
            }
        })
    })
</script>
