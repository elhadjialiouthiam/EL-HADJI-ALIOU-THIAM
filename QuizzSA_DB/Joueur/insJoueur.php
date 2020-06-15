<?php
session_start();
require_once('register.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page connexion</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/Style.css">
</head>
<body>
    <div class="container">
        <div class="row ">
            <div class="col-sm-1 h-10" >
            <img src="../style/Images/logo-QuizzSA.png" class="img-fluid" alt="Cinque Terre">
            </div>
            <div class="col-sm-11 " style="background-color: rgba(155, 81, 224, 0.9);">
            <h1 class="text-center mt-4 mb-0">LE PLAISIR DE JOUER</h1>
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12 " style="background-color:#C4C4C4;">
            <h1 class="text-center">S'INSCRIRE</h1>
            <h2 class="text-center"> Pour tester votre niveau de culture générale</h2>
            </div>
        </div>
        <form action="" method="POST">
             <div class="row">
                <div class="col-sm-3 bg-white" >
                    <img alt="" id="output" class="mt-3"/>
                    <p class="ava"> <input  accept="Image/*" name="avatar" type="file" onchange="loadFile(event)" ></p>
                </div>
                <div class="col-sm-9 bg-white" >
                    <div class="container">
                
                            <div class="form-group mt-3">
                                <label >Prenom<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name='prenom' id="prenom" onkeyup="validPrenom()" required>
                                <span id="prenominf" style="color: red"></span>
                            </div>
                            <div class="form-group">
                                <label >Nom<span style="color: red">*</span></label>
                                <input type="text" class="form-control" name='nom' id ="nom" onkeyup="validNom()" required>
                                <span id="nominf" style="color: red"></span>
                            </div>
                            <div class="form-group">
                                <label >Login<span style="color: red">*</span></label>
                                <input type="text" name='login' class="form-control"   required="requered" id="login" onkeyup="validLogin()">
                                <span id="logininf" style="color: red"></span>
                            </div>
                            <div class="form-group">
                                <label >Mot de passe<span style="color: red">*</span></label>
                                <input type="password" name="mdp" class="form-control" required="requered" id="mdp" onkeyup="validMdp()" required>
                                <span id="mdpinf" style="color: red"></span>
                            </div>
                            <div class="form-group">
                            <label >Confirmation mot de passe<span style="color: red">*</span></label>
                            <input type="password" name="cmdp" required="requered" id="cmdp" onkeyup="validCmdp()" class="form-control" required><br/>
                            <span id="cmdpinf" style="color: red"><?php echo $error; ?></span>
                            </div>
                            <div >
                                <button name="submit" id="btn" class="btn btn-success mb-3" type="submit">Valider</button>
                            </div>
                   
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="inscription.js"></script
</html>