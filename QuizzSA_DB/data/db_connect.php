<?php
     // connexion à la base de données
     $db_username = 'Ass';
     $db_password = 'Ass97';
     $db_name     = 'Quizz_SA';
     $db_host     = 'localhost';

     try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Connected successfully";
      } catch(PDOException $e) {
        //echo "Connection failed: " . $e->getMessage();
      }
?>