<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/stripe.css">
    <script src="https://kit.fontawesome.com/c1cb64b22b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Paiement</title>
</head>
<body>
    <?php require(__DIR__ . '/../components/header.php'); ?>
    <?php
if(isset($_POST['date_debut']) && isset($_POST['date_fin']) && isset($_SESSION['ID'])){
    require_once('../../vendor/autoload.php');
    $prix = $_POST['price'];
    $prix = round($prix, 2);
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST["date_fin"];
    \Stripe\Stripe::setApiKey('sk_test_51NiItcEulzwDXkR8NeNt88aPze7avuWgJEUe0OmLeNoZgW8HUdI8PmtGMROtJOkm0dJYMYlBTuvDJIVhFu2vh0Ns00oqSxy2uJ');

    $intent = \Stripe\PaymentIntent::create([
        'amount' => $prix * 100,
        'currency' => 'eur'
    ]);   
}else {
}
?>
<script>
    const userID = <?= $_SESSION['ID']; ?>;
    const reservationID = <?= $_SESSION['reservationID']; ?>;
    const dateParts = "<?php echo date('Y-m-d', strtotime($date_debut)); ?>".split("-");
    const date_debut_js = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);
    const date_debut = date_debut_js.toLocaleDateString('fr-FR').replace(/\//g, '-');
    const datePartsFin = "<?php echo date('Y-m-d', strtotime($date_fin)); ?>".split("-");
    const date_fin_js = new Date(datePartsFin[0], datePartsFin[1] - 1, datePartsFin[2]);
    const date_fin = date_fin_js.toLocaleDateString('fr-FR').replace(/\//g, '-');
</script>
    <main>
        <div class="info">
            <p id="recap">Récapitulatif du paiement</p>
            <div class="informations">
                <h1><?= $_POST['title'] ?></h1>
                <div class="dates">
                    <p>Vos dates</p>
                    <div class="dates__content">
                    <p>Du <?= $date_debut ?></p>
                    <p>au <?= $date_fin ?></p>
                    </div>
                </div>
                <div class="paymentmethods">
                    <p id="payment__title">Choisissez comment payer</p>
                    <div class="payment__total">
                        <p id="totality">Payer la totalité</p>
                        <p id="now">Payer le total maintenant.</p>
                    </div>
                </div>
                <h3><?= $prix?>€ au total </h3>
            </div>
        </div>
    <form method="POST" id="form">
        <!-- ERREUR PAIEMENT -->
        <div id="errors"></div>
        <input type="text" name="name" id="cardholder-name" placeholder="Titulaire de la carte">
        <!-- FORMULAIRE DE SAISIE DE LA CARTE -->
        <div class="input" id="card-elements"></div>
        <!-- ERREUR A LA CARTE -->
        <div id="card-errors" role="alert"></div>
        <button id="card-button" data-secret="<?= $intent['client_secret'] ?>">Procéder au paiement</button>
        <div id="card-success">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
        </div>
    </form>
    </main>
    
    <script src="https://js.stripe.com/v3/"></script>
    <script src="../js/Stripe.js"></script>
</body>
</html>
