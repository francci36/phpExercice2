<?php
session_start();
require('core/functions.php');
if($_SESSION['connect'] != 1 && (empty($_COOKIE['login']) || empty($_COOKIE['password'])))
{
    $message = 'Vous devez vous reconnecter';
    header('location:membres.php?message='.urlencode($message));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur notre espace membre</title>
</head>
<body>
   <?php include('inc/header.php'); ?>
   <h1>Bonjour <?php echo $_COOKIE['login']; ?></h1>

   <form method="post" action="action.php?e=upload" enctype="multipart/form-data">
    <label for="fichier">Ajouter un fichier</label>
    <input type="file" name="fichier" />
    <label for="fichier2">Ajouter un fichier</label>
    <input type="file" name="fichier2" />
    <br />
    <button type="submit" name="submit">Envoyer</button>
   </form>
   <a href="action.php?e=deco">Se déconnecter</a>
   <?php include('inc/footer.php'); ?>
</body>
</html>