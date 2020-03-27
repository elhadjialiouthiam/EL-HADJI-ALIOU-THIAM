 n <?php
require('index.html');
session_start();
$affiche= 'none';
$n=null;
$somme=null;
$moyenne=null;
$erreur='';
$inferieurs=[];
$superieurs=[];
$t1=[];
$t=['inferieurs'=>$inferieurs,'superieurs'=>$superieurs];
if(isset($_POST['valid']))
{
    $t1[]=1;
    $n=$_POST['n'];
    if($n>10000)
    {
        for($i=2;$i<=$n;$i++)
        {
            $ctrl=null;
            for($j=2;$j<=($i/2);$j++)
            {
                if($i%$j==0)
                {
                    $ctrl+=1;
                }
               
            }
            if($ctrl==null)
            {
                $t1[]=$i;
                $somme=$somme+$i;
            }
            $affiche='';
        }  
        $_SESSION['t1'] = $t1;
    }
    else
     {
        $erreur='veillez saisir un autre nombre superiur à 10000';
     }
     if((sizeof($t1)%100) == 0){

        $_SESSION['nbreDePage'] = (int)(sizeof($t1)/100);
    }
    else {
        $_SESSION['nbreDePage'] = (int)(sizeof($t1)/100) +1;

    } 
    function moyenne($somme,$t1)
    {
        return $somme/sizeof($t1);
    }
    $moyenne=moyenne($somme,$t1);
    for($i=0;$i<sizeof($t1);$i++)
    {
        if ($t1[$i]<$moyenne) 
        {
            $t['inferieurs'][]=$t1[$i];
        } 
        else 
        {
            $t['superieurs'][]=$t1[$i];
        }
        $_SESSION['inferieurs']=$t['inferieurs'];
        $_SESSION['superieurs']=$t['superieurs'];
        
    }

}
if(!isset($_GET['page'])) {
    $page = 1; 
}
else {
    $page = $_GET['page'];
}
$min = ($page-1)*100;
$max = $page*100;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXO1</title>
</head>
<style>

    *{
        box-sizing: border-box;
    }
    .result{

        display: <?= $affiche ?>

    }

    body{

        padding: 1rem;

        font-family: 'calibri'

    }

    ul{

        font-size: 1rem;
        font-weight: bold;
        display: flex;
        flex-direction: column;

    }
    .sorties {
        width: 62px;
        height: 30px;
        border: 1px solid black;
    }
    h6{
        width: 100%;
    }
    .page 
    {
        width:100%;
        display:flex;
        flex-flow: row wrap;
    }

</style>

<body>
<div class="EXO">
    <form method="post">
        <input  name="n" placeholder="donner un nombre entier superieur à 10000" style="height:50px;width:400px;border: solid;margin-left: 450px;margin-top: 50px;">
        <p>
        <input type="submit" name="valid" style="background-color: blue;height:50px;width:100px;color:white;border: none;margin-left: 600px;">
        </p>
    </form>
    </div>
    <li>
        <p>Les nombres premiers entre 1 et <?= $n ?> sont représentés dans le tableau suivant: </p>
            <div class="page">
            <?php 
            if($page==$_SESSION['nbreDePage']) {
                for($i=$min; $i<sizeof($_SESSION['t1']); $i++)
                { 
                    echo '<div class="sorties">'.$_SESSION['t1'][$i].'</div>' ;
                } 
            }
            else {
                for($i=$min;$i<$max;$i++)
                { 
                    echo '<div class="sorties">'.$_SESSION['t1'][$i].'</div>' ;
                } 
            }
            ?>
            </div>
            <form>
                <?php
                    for($i=1; $i<=$_SESSION['nbreDePage']; $i++)
                    { ?>
                    <button name="page" value="<?= $i ?>"><?= $i ?></button> 
                    <?php }
                ?>
            </form>
        </li>
        <p> La moyenne de ces nombres premier est:<?= $moyenne; ?></p>
        <li>
        <p>Ceux inferieurs à la moyenne sont représentés dans le tableau suivant: </p>
            <div class="page">
            <?php 
            if($page==$_SESSION['nbreDePage']) {
                for($i=$min; $i<sizeof($_SESSION['inferieurs']); $i++)
                { 

                    echo '<div class="sorties">'.$_SESSION['inferieurs'][$i].'</div>' ;
                } 
            }
            else {
                for($i=$min;$i<$max;$i++)
                { 
                    echo '<div class="sorties">'.$_SESSION['inferieurs'][$i].'</div>' ;
                } 
            }
            ?>
            </div>
            <form>
                <?php
                    for($i=1; $i<=$_SESSION['nbreDePage']; $i++)
                    { ?>
                    <button name="page" value="<?= $i ?>"><?= $i ?></button> 
                    <?php }
                ?>
            </form>
        </li>
        <li>
        <p>Ceux superieurs à la moyenne sont représentés dans le tableau suivant: </p>
            <div class="page">
            <?php 
            if($page==$_SESSION['nbreDePage']) {
                for($i=$min; $i<sizeof($_SESSION['superieurs']); $i++)
                { 
                    echo '<div class="sorties"> '.$_SESSION['superieurs'][$i].'</div> ' ;
                } 
            }
            else {
                for($i=$min;$i<$max;$i++)
                { 
                    echo '<div class="sorties"> '.$_SESSION['superieurs'][$i].'</div> ' ;
                } 
            }
            ?>
            </div>
            <form>
                <?php
                    for($i=1; $i<=$_SESSION['nbreDePage']; $i++)
                    { ?>
                    <button name="page" value="<?= $i ?>"><?= $i ?></button> 
                    <?php }
                ?>
            </form>
        </li>
    <p><?php echo $erreur ?></p>
</body>
</html>  

