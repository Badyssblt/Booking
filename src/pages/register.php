<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/register.css">
    <title>S'inscrire</title>
</head>
<body>
    <?php
        require(__DIR__ . '/../components/header.php');
    ?>
    <main>
        <div class="log__container">
            <div class="container__left">
                <img src="../public/images/registerhero.png" alt="Image de la page register">
            </div>
            <div class="container__right">
                <h1 class="container__right__title">S'inscrire</h1>
                <form id="form">
                    <div class="name__surname">
                        <div class="name">
                            <label for="surname">Prénom</label>
                            <input type="text" name="surname" id="surname" autocomplete="off">
                        </div>
                        <div class="name">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" autocomplete="off">
                        </div>
                    </div>
                    <label for="email">Adresse email</label>
                    <input type="text" name="email" id="email" class="mail" autocomplete="off">
                    <div class="name__surname">
                        <div class="name">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="name">
                            <label for="confirm">Confirmer</label>
                            <input type="password" name="confirm" id="confirm">
                        </div>
                    </div>
                    <input type="submit" value="S'inscrire" class="log__submit">
                    
                </form>
            </div>
        </div>
    </main>
</body>
</html>
<script src="https://kit.fontawesome.com/c1cb64b22b.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#form").submit((e) => {
            e.preventDefault();
            const surname = $("#surname").val();
            const name = $("#name").val();
            const email = $("#email").val();
            const password = $("#password").val();
            const confirmPass = $("#confirm").val();
            if(password == confirmPass){
                $.ajax({
                type: "POST",
                url: "../process/register.php",
                data: {
                    surname: surname,
                    name: name,
                    email: email,
                    password: password
                },
                dataType: "json",
                success: function (response) {
                    $("#form").append("<div class='create'><div class='circle'></div><p>Compte crée</p></div>");
                    setTimeout(function() {
                        window.location.href = "/"; 
                    }, 2800);
                },
                error: function(){
                    console.log("erreur");
                }
            });
            }else {
                $("#form").append("<div><p>Veuillez confirmer votre mot de passe</p></div>")
            }
           
        })
    })
</script>