<div class="filter__wrapper">
    <div class="search">
    </div>
    <div class="filters">
        <form action="" method="GET" id="filter__form">
            <input type="text" name="search" id="search" placeholder="Rechercher avec un nom" autocomplete="off">
            <input type="number" name="chamber" id="chamber" placeholder="Nombre de chambres">
            <div class="animal">
                <i class="fas fa-cat"></i>
                <select name="animal" id="animal">
                    <option value="" disabled selected>Animaux</option>
                    <option value="1">Accepté</option>
                    <option value="0">Non accepté</option>
                </select>
            </div>
            <div class="wifi">
                <i class="fas fa-wifi"></i>
                <select name="wifi" id="wifi">
                    <option value="" disabled selected>Wifi</option>
                    <option value="1">Accepté</option>
                    <option value="0">Non accepté</option>
                </select>  
            </div>
            <input type="submit" value="Rechercher">
        </form>
    </div>
</div>
<script>
    $(document).ready(() => {
        $("#filter__form").submit((e) => {
            e.preventDefault();
            $(".destinations__container").empty();
            let name = $("#search").val();
            let chamber = $("#chamber").val();
            let animal = $("#animal").val();
            let wifi = $("#wifi").val();
            $.ajax({
                type: "GET",
                url: "../../process/search.php",
                data: 
                {
                    name: name,
                    animal: animal,
                    wifi: wifi,
                    chamber: chamber
                },
                dataType: "JSON",
                success: function (response) {
                    for(let i = 0; i < response.length; i++){
                        let destinationsItem = $("<div class='destinations__items'></div>");
                        let {ID, animaux, chambre, coordonne, description, image, nom, prix, userID, wifi} = response[i];
                        let imgContainer = $("<div class='destinations__img__container'></div>");
                        imgContainer.append("<img class='destinations__img' src='" + image + "'/>");
                        destinationsItem.append(imgContainer);
                        destinationsItem.append("<p class='items__title'>" + nom + "</p>");
                        destinationsItem.append("<p class='items__price'>" + prix + "€ par nuit</p>");
                        let url = "/pages/reservations.php?id=" + ID;
                        destinationsItem.append("<a class='items__link' href='" + url + "'>Réserver</a>");
                        $(".destinations__container").append(destinationsItem);
                    }
                },error: function (jqXHR){
                    console.log(jqXHR);
                }
            });
        })
    })
</script>