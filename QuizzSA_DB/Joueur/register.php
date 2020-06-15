<?php

    if (isset($_POST['submit']) && isset($_POST['prenom']) &&isset($_POST['nom'])&&isset($_POST['login'])&&isset($_POST['mdp'])&&isset($_POST['cmdp'])&& isset($_POST['avatar'])) {
        if (!empty($_POST['avatar'])) {
           
        
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $login = $_POST["login"];
            $password = $_POST["mdp"];
            $cpassword=$_POST["cmdp"];
            $avatar = $_POST["avatar"];
            $score=0;
            if ($password==$cpassword) {

            require_once('../data/db_connect.php');
                //On insère les données reçues
                $sth = $pdo->prepare("
                    INSERT INTO Joueur(prenom, nom, login, password, avatar,score)
                    VALUES(:prenom, :nom, :login, :password, :avatar,:score)");
                $sth->bindParam(':prenom',$prenom);
                $sth->bindParam(':nom',$nom);
                $sth->bindParam(':login',$login);
                $sth->bindParam(':password',$password);
                $sth->bindParam(':avatar',$avatar);
                $sth->bindParam(':score',$score);
                $sth->execute();
                //On renvoie l'utilisateur vers la page de remerciement
                header('Location: ../index.php');
            }else {
                    $error="les deux mots de passe ne coresponde pas";
                   }
    }else {
        echo "error";
    }
}
?>