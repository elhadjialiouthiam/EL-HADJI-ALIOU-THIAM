<?php
    if(isset($_POST['user']) && isset($_POST['mdp']))
    {
        // connexion à la base de données
        $db_username = 'Ass';
        $db_password = 'Ass97';
        $db_name     = 'Quizz_SA';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name);
    }
    mysqli_close($db); // fermer la connexion
?>