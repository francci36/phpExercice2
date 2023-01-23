<?php
session_start();
require('core/functions.php');
switch($_GET['e'])
{
    case 'connexion':

        if(isset($_POST['submit']))
        {
            if(!empty($_POST['login']) && !empty($_POST['password']))
            {
                // On regarde si le login et le password existe
                if(verifConnect($_POST['login'],$_POST['password']))
                {
                    $_SESSION['connect'] = 1;
                    setcookie('login',$_POST['login'],(time()+3600));
                    setcookie('password',$_POST['password'],(time()+3600));
                    header('location:prive.php');
                    exit;
                }
                else
                {
                    $message = 'Login ou mot de passe incorrect';
                }
            }
            else
            {
                $message = 'Veuillez renseigner un login et mot de passe';
            }
            header('location:membres.php?message='.urlencode($message));
            exit;
        }

    break;

    case 'deco':

        $_SESSION['connect'] = 0;
        setcookie('login',null,(time()-10));
        setcookie('password',null,(time()-10));
        header('location:membres.php');

    break;

    case 'upload':

        if( isset($_POST['submit']) ) {
    
            $message = "Fichier(s) envoyé(s) avec suscès : ";
            
            // upload le 1er fichier
            if( is_uploaded_file( $_FILE['fichier']['tmp_name']) ) {
                $etat_fichier = uploadFichier( $_FILE['fichier'] );
                if( $etat_fichier ) {
                    $message .= $_FILE['fichier']['name'] .' ';
                }
            }
            
            // upload le 2nd fichier
            if( is_uploaded_file( $_FILE['fichier2']['tmp_name']) ) {
                $etat_fichier = uploadFichier( $_FILE['fichier2'] );
                if( $etat_fichier ) {
                    $message .= $_FILE['fichier2']['name'] ;
                }
            }
            
            
            // on retourne vers l'utilisateur
            header( 'location:prive.php?message='.urlencode($message) );
            
        }
        

    break;
}
