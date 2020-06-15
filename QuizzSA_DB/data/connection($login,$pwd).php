<?php
session_start();
$serveur="localhost";
$dbname="Quizz_SA";
$user="Ass";
$pass='Ass97';
$msg='';

try{
       //on se connecte à la base dde donnée
  $bdd= new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  //on verifie si les champs ne sont pas vides
  if( !empty($_POST['login'])  && !empty($_POST['mdp'])   ){
                //le cas echeant ,on les affecte à des variables
    $login=$_POST['login'];
    $password=$_POST['mdp'] ;
            //on recherche les donnees dans la base de donnée admin
    $req1 = $bdd->prepare("SELECT * FROM Joueur WHERE login = ? AND password = ?");
    $req1 ->execute(array($login,$password));
    $row1 = $req1->rowCount();
            //on recherche les donnes dans la base de donnée utilisateur
    $req2 = $bdd->prepare("SELECT * FROM Admin WHERE login = ? AND password = ?");
    $req2 ->execute(array($login,$password));
    $row2 = $req2->rowCount();          //nous renvoie le nbre de rslts obtenues
    // connexion admin
    if($row2 == 1)
    {
      $de = $req2->fetch();
      //on affecte les resultats obtenues aux identifiants du admin
      $usr = $de['login'];
      $pss = $de['password'];
      $fname = $de['nom'];
      $lname = $de['prenom'];
      $photo = $de['avatar'];

//verification des donnees :on verifie si les entrees correspondent aux  données dans la base
      if($login==$usr && $password==$pss)
      {

        $_SESSION['login'] = $usr;
        $_SESSION['password'] = $pss;
        $_SESSION['nom'] = $fname;
        $_SESSION['prenom'] = $lname;
        $_SESSION['avatar'] = $photo;

        header("location:Admin/admin.php?id=");
      }
    }
 //connexion utilisateur
    if($row1 == 1)
    {
      $de = $req1->fetch();
      //on affecte les resultats obtenues aux identifiants du joueur
      $usr = $de['login'];
      $pss = ($de['password']);
      $fname = $de['nom'];
      $lname = $de['prenom'];
      $photo = $de['avatar'];

      if($login==$usr && $password==$pss)
      {
        $_SESSION['login'] = $usr;
        $_SESSION['password'] = $pss;
        $_SESSION['nom'] = $fname;
        $_SESSION['prenom'] = $lname;
        $_SESSION['avatar'] = $photo;

        header("location:Joueur/joueur.php");
      }

    }
    else{
      $msg = "<strong>Attention!</strong> login ou mot de passe incorrect";
    }

  }

}catch(PDOException $e)
{
  echo "Connection failed" ;
}
?>