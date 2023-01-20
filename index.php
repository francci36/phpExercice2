<?php
//ini_set('display_errors',true);
session_start();
require('core/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur mon site</title>
</head>
<body>
    <?php
    include('inc/header.php');
    ?>
    <h1>Page d'accueil</h1>
    <p>Bienvenue sur mon premier site PHP avec des includes</p>
    <?php
    include('inc/footer.php');
    ?>
</body>
</html>