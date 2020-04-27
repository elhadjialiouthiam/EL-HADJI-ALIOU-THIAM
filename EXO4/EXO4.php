<?php
require('index.html');
 require_once "fonction4.php" 
?>
<?php
    $text0='';
    $text='';
    if (isset($_POST['text'])) {
        $text0=$_POST['text'];
    }

        else {
            echo"Veiller saisir un text";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice4</title>
</head>
<body>
       <form action="" method="POST">
           <textarea name="text"  cols=100 rows="10"><?= $text0 ?></textarea>
           <input type="submit" value="ENVOI" name="ENVOI">
       </form>
</body>
</html>
<?php
    if(isset($_POST['ENVOI'])){
            $text0=$_POST['text'];
            $text=CorrigéText($text0);
        }
?>