<?php
require('db_connect.php');
$login=$_POST['login'];
$sql1="SELECT login FROM Joueur WHERE login = '$login'";
?>