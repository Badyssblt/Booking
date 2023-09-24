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
                <h1 class="container__right__title">Se connecter</h1>
                <form id="form">
                    <label for="email">Adresse email</label>
                    <input type="text" name="email" id="email" class="mail" autocomplete="off">
                    <div class="name__surname">
                        <div class="name">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password">
                        </div>
                    </div>
                    <?php
                        if(!isset($_SESSION["ID"])){ ?>
                            <input type="submit" value="Se connecter" class="log__submit">
                            <?php
                        }
                    ?>
                    
                    
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
            const email = $("#email").val();
            const password = $("#password").val();
            $.ajax({
                type: "POST",
                url: "../process/login.php",
                data: {
                    email: email,
                    password: password
                },
                dataType: "json",
                success: function (response) {
                    if(response.action === "connect"){
                        $("#form").append("<div class='login__message'><div class='circle'></div><p>Vous vous êtes connecté, vous allez êtes redirigés</p></div>");
                        setTimeout(function() {
                        window.location.href = "/"; 
                    }, 2800);
                    }
                },
                error: function(){
                    console.log("erreur");
                }
            });
        })
    })
</script>
