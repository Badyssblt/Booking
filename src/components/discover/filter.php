<div class="filter__wrapper">
    <div class="search">
    </div>
    <div class="filters">
        <form action="" method="GET" id="filter__form">
            <input type="text" name="search" id="search" placeholder="Rechercher avec un nom">
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
                },error: function (jqXHR){
                    console.log(jqXHR);
                }
            });
        })
    })
</script>