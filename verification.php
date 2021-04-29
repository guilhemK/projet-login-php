<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    $db_username = 'root';
    $db_password = 'password';
    $db_name = 'login';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username,$db_password,$db_name) or die('impossible de se connecter à la base de données');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    if($username !=="" && $password !=="")
    {
        $requete = "SELECT count(*) FROM utilisateur where nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0)
        {
            $_SESSION['username'] = $username;
            header('location: acceuil.php');
        }
        else{
            header('location: login.php?erreur=1');//user ou mp incorrect
        }

    }
    else
    {
        header('location: login.php?erreur=2');//user ou mp vide
    }   
}
else
{        
    header('location: login.php');
}
mysqli_close($db);//fermer la connexion
?>