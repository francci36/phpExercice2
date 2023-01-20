<?php
$menu_footer = array(
    'mentions.php' => 'Mentions légales',
    'contact.php' => 'Nous contacter'
);
function afficheMenu($emplacement='header')
{
    $str = '<ul>';
    if($emplacement=='header')
    {
        $menu_header = array(
            'index.php' => 'Accueil',
            'membres.php' => 'Espace membres',
            'contact.php' => 'Nous contacter'
        );
        foreach($menu_header as $lien => $titre)
        {
            $str.= '<li><a href="'.$lien.'">'.$titre.'</a></li>';
        }
    }
    else if($emplacement=='footer')
    {
        global $menu_footer;
        foreach($menu_footer as $lien => $titre)
        {
            $str.= '<li><a href="'.$lien.'">'.$titre.'</a></li>';
        }
    }
    $str.= '</ul>';
    return $str;
}
$identifiants = array('admin','joseph','gerald','kevin');
$motdepasses = array('12345','ehpad','laguna','htmlcss');
function verifConnect($login,$password)
{
    global $identifiants;
    global $motdepasses;
    if(in_array($login,$identifiants) && in_array($password,$motdepasses))
    {
        return true;
    }
    else
    { 
        return false;
    }
}
$extensions = array('.pdf','.png','.jpg','.mp4','.gif');
function uploadFichier($fichier)
{
    global $extensions;
    $verif_extension = strrchr($fichier['name'],'.');
    if(in_array($verif_extension,$extensions))
    {
        // On vérifie si le dossier de l'user existe
        if(!is_dir('upload/'.$_COOKIE['login']))
        {
            // Si il existe pas on le créer
            mkdir('upload/'.$_COOKIE['login']);
        }
        // On transfère notre fichier dans son dossier
        if(move_uploaded_file($fichier['tmp_name'],'upload/'.$_COOKIE['login'].'/'.$fichier['name']))
        {
            return true;
        }
    }
    // récupère le nom original du fichier
$extensions = $fichier['name'];

// récupère l'extension du fichier
$extensions= pathinfo($extensions, PATHINFO_EXTENSION);

// génère un nom de fichier aléatoire
$randomFileName = rand() . '.' . $extensions;

// définit le nouveau chemin de destination pour le fichier
$destination = 'upload/' . $randomFileName;

// déplace le fichier téléchargé vers la destination
move_uploaded_file($fichier['name']['tmp_name'], $destination);
}
?>