<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
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
        <div class="row">
            <div class="col-sm-3 bg-white" >
                <img alt="" id="output"/>
                <p class="ava"> <input type="file" name="img" accept="Image/*" onchange="loadFile(event)"></p>
            </div>
            <div class="col-sm-9 bg-white" >
            <form>
                    <div class="form-group mt-3">
                        <label >Prenom</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Prenom">
                    </div>
                    <div class="form-group">
                        <label >Nom</label>
                        <input type="text" class="form-control"  placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <label >Login</label>
                        <input type="text" class="form-control"  placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label >Mot de passe</label>
                        <input type="password" class="form-control" >
                    </div>
                    <div class="form-group">
                    <label >Confirmation mot de passe</label>
                        <input type="password" class="form-control" >
                    </div>
                    <div >
                        <button class="btn btn-success mb-3" type="submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="../script.js"></script>
</html>