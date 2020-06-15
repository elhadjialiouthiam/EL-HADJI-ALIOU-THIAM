<?php

        if (isset($_POST['submit']) && isset($_POST['prenom']) &&isset($_POST['nom'])&&isset($_POST['login'])&&isset($_POST['mdp'])&&isset($_POST['cmdp'])&& isset($_POST['avatar'])) {
                if (!empty($_POST['avatar'])) {
                    
                    $prenom = $_POST["prenom"];
                    $nom = $_POST["nom"];
                    $login = $_POST["login"];
                    $password = $_POST["mdp"];
                    $cpassword=$_POST["cmdp"];
                    $avatar = $_POST['avatar'];
                    if ($password==$cpassword) {

                    require_once('../data/db_connect.php');
                    
                        //On insère les données reçues
                        $sth = $pdo->prepare("
                            INSERT INTO Admin(prenom, nom, login, password, avatar)
                            VALUES(:prenom, :nom, :login, :password, :avatar)");
                        $sth->bindParam(':prenom',$prenom);
                        $sth->bindParam(':nom',$nom);
                        $sth->bindParam(':login',$login);
                        $sth->bindParam(':password',$password);
                        $sth->bindParam(':avatar',$avatar);
                        $sth->execute();
                        
                        //On renvoie l'utilisateur vers la page 
                        header('Location:  admin.php');
                    }else {
                     $error="les deux mots de passe ne coresponde pas";
                    }
                
                }else {
                    echo "error";
                }
            }
?>