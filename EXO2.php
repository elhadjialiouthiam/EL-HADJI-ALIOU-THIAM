<?php
require('index.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EXO2</title>
</head>
<style>
      .legende{
          position: absolute;
        margin-left: 45%;
        margin-top: 30px;
      }
      form{
        margin: 50px 0px 20px 40%;
        height: 10em;
        width: 20em;
        background: grey;
        border-radius: 50px;
      }
      select{
          margin: 35px;
          margin-left:35%;
      }
      input[type="submit"]{
        margin-left:40%;
        background: maroon;
        height: 30px;
        width: 60px;
        border:none;
      }
      input[type="submit"]:hover{
        background: lime;
        color:honeydew;
      }
      .table{
          margin:70px 0px 0px  40%;
          width: 350px;
          height: 140px;
          background: black;
          padding: 0px;
      }
      .ligne:nth-child(even){
          background: #ccf;
          border: solid 5px black !important;
      }
      .ligne:nth-child(odd){
          background: #ccc;
          border: solid 5px black !important;
      }
      .mois{
          padding-left:15px;
          border-collapse: collapse;
          margin: -20px !important;
      }
      .numero{
          text-align: center;
          padding: 5px !important;
          margin: -20px !important;
          border-collapse: collapse;
      }
</style>

<body>
<feildset class="bordure">
           <legend class="legende">Choisissez votre langue</legend>
           <form action="" method="post">
                <select name="choix" id="langue">
                    <option value="none">None</option>
                    <option value="francais">FRANCAIS</option>
                    <option value="anglais">ANGLAIS</option>
                </select><br>
                <input type="submit" value="ENVOI">
           </form>
       </feildset>
<?php
            function Langue(array $tab){
                $n= 0;
                echo '<table class="table">';
                for($i=0 ; $i<4; $i++){
                    echo '<tr class="ligne">';
                    for($j =0; $j<3; $j++){
                        echo '<td class="numero">';
                        echo  $n+=1 ;
                        echo "</td>";
                        echo '<td class="mois">'.$tab[$i][$j].'</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
            }
       $francais= array(
                    array("Janvier","Février","Mars"),
                    array("Avril","Mai","Juin"),
                    array("Juillet","Août","Septembre"),
                    array("Octobre","Novembre","Decembre"));

       $anglais=array(
                    array("Janvary","Febriary","Mars"),
                    array("April","May","Jun"),
                    array("July","August","September"),
                    array("October","November","December"));

       if(@$_POST['choix']=="francais"){
           Langue($francais);
       }elseif(@$_POST['choix']=="anglais"){
           Langue($anglais);
       }else{
           print "vous devez choisir une langue";
       }

       ?>
</body>
</html>