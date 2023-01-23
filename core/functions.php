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

// globale - tableau listing des types de fichiers autorisés
$fichiers_extensions_autorises = array('.pdf','.png','.jpg','.mp4','.gif');


/**
 * 
 * 
 * 
 * @global array $fichiers_extensions_autorises
 * @param array $fichier  ['name', 'tmp_name']
 * @return boolean
 */
function uploadFichier( $fichier )
{
    global $fichiers_extensions_autorises;
    
    
    // fabrique le dossier de destination en fonction de l'user connecté
    // Exemple : ...../htdocs/upload/joseph
    $destination = $_SERVER['HOME'] . '/upload/' . $_COOKIE['login'];
    
    // récup l'extension du fichier  $fichier
    // Exemple : dossier/doosier/photo-mylene.jpg  >>> .jpg
    $fichier_extension = strrchr( $fichier['name'], '.' );
    
    
    
    // est ce un fichier autorisé ?
    if( in_array($fichier_extension, $fichiers_extensions_autorises) == false )
        return false;
    
    
    // est ce que le dossier de l'user existe pour y déplaer ce nouveau fichier uploadé ?
    if( !is_dir($destination)  ) {
        // Comme le dossier n'existe pas, on le crée
        mkdir( $destination );
    }
    
    
    
    // créer un nom aléatoire pour ce $fichier
    // Exemple : 09aj245.jpg
    $nouveauNom = uniqid() . $fichier_extension;
    
    
    // déplacer le fichier dans le dossier de l'user
    // Exemple : upload/joseph/a987348DHZJKD.jpg
    $deplacer = $destination . '/' . $nouveauNom;
    
    
    // déplacement du fichier
    if( move_uploaded_file($fichier['tmp_name'], $deplacer)  ) {
        
        // déplacé avec succès
        return true;
    }
    
    
    
    return false;
    
   
}


