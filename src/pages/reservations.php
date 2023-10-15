<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css">
    <link rel="stylesheet" href="../css/reservation.css">
    <link rel="stylesheet" href="../css/index.css">
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
        
    </script>
    <script src="../js/Map.js"></script>
    <script src="../js/Reservation.js"></script>
    <main class="main">
        <script>
            $(document).ready(() => {
                $(".main").load('../components/reservationContent.php');
            })
        </script>
        <?php
            $_SESSION['reservationID'] = $_GET['id'];        ?>
    </main>
    <?php require("../components/footer.php") ?>
</body>
</html>
<script src="https://kit.fontawesome.com/c1cb64b22b.js" crossorigin="anonymous"></script>

