<?php 
session_start();
    if(isset($_POST[Enregistrer])){

        $Erreur=array();
        if (!empty($_POST['quest']) && !empty($_POST['score'])) {
            if ($_POST['score']>1) {
                $creerquestion=[];
                $creerquestion['question']=$_POST['quest'];
                $creerquestion['score']=$_POST['score'];
                $creerquestion['choix']=$_POST['choix'];
                $creerquestion['rep']=$_POST['rep'];
                $creerquestion['reponse']=array($_POST['reponse']);
                $creerquestion['vraixreponse']=array($_POST['vraixreponse']);
                $json=file_get_contents('question.json');
                $json=json_decode($json,true);
                $question=$json;
                $json[]=$creerquestion;  
                $json=json_encode($json);
                file_put_contents('question.json',$json);
            }

        }else {
            $Erreur[]="Ce champ est obligatoire";  
        }

        foreach($Erreur as $Error){

            echo "<h4>".$Error."</h4>";

        }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page question</title>
    <link rel="stylesheet" href="creer.css">
</head>

<body>
    <header class="header">
        <img src="Images\logo-QuizzSA.png" alt="logo">
        <h2>Le plaisir de jouer</h2>
    </header>
    <form action="" method="POST">
            <div class="fieldset">
                <div class="p1">
                    <p class="smallheader">CRÉER ET PARAMÉRTER VOS QUIZZ</p> <button class="deconnexion"> <a href="deconnexion.php"> Déconnexion</a></button>                
                </div>
                <div class="menu">
                    <div class="avatar">
                        <div class="donnée">
                    <?php echo "<br>".$_SESSION['prenom'];
                        echo "<br><br>".$_SESSION['nom']; ?>
                        </div>
                        <div id="wrapper">
                            <img src="" alt="" id="output_image">
                        </div>
                    </div>
                        <ul class="listemenu">
                        <li class="list1"><a href="accueilAdmin.php">Liste Questions <img src="Images/Icônes/ic-liste.png" alt=""></a></li>
                        <li class="list2"><a href="insAdmin.php">Créer Admin<img src="Images/Icônes/ic-ajout.png" alt=""></a></li>
                        <li class="list3"><a href="listeJoueur.php">Liste joueurs <img src="Images/Icônes/ic-liste.png" alt=""></a></li>
                        <li class="list4"><a href="question.php">Créer Questions <img src="Images/Icônes/ic-ajout-active.png" alt=""></a></li>
                        </ul>
                </div>
                <div class="fieldset1">
                    <DIV class="smallheader">
                        <h2>PARAMETRER VOTRE QUESTION</h2>
                    </DIV>
                    <form action="" method="POST">
                    <div class="parametre">
                    Questions <input name="quest" id="question" onclick="question" onkeyup="validQuestion()" style="width: 400px; height: 70px;" type="text">
                    <span id="questioninf" style="color: red"></span>
                    <br><br>Nbre de Points <input name="score" id="score" onclick="score" onkeyup="validScore()" style="width: 30px;" type="number"  >
                    <span id="scoreinf" style="color: red"></span>
                    <br>Type de réponse
                     <select name="choix" style="width: 300px;height:40px"  id="typereponse" onclick="choix(this.value)" onkeyup="validTypereponse()">
                     <span id="typereponseinf" style="color: red"></span>
                     <option value="">Donnez le type de réponse</option>
                    <option name="radio" value="simple">Réponse à choix multiples (avec une seule réponse possible)</option>
                    <option name="chexbox" value="multiple">Réponse à choix multiples (avec plusieurs réponse possibles)</option>
                    <option name="text" value="text" >Réponse  texte à saisir</option>
                    </select> <img style="" src="Images/Icônes/ic-ajout-réponse.png" onclick="add()" alt="" >
                    <br><br><br>
                     
                     <div id="inputs"> 
                     </div > 
                     <button name="Enregistrer" type="submit">Enregistrer</button>
                     </form> 
                    <script type="text/javascript" >
                                var i=1;
                                var j=1;
                        function addInputSimple() {

                            var divInputs = document.getElementById("inputs");
                            var newInput = document.createElement("div");
                            newInput.innerHTML = `<br><input style="width: 200px;height:30px" class="input-reponse" type="texte" name="reponse[${i}]" id="texte">
                            <input name="vraixreponse[${i}]"  type="radio" name="simple" id="simple"><img src="Images/Icônes/ic-supprimer.png" alt="">`;
                            divInputs.appendChild(newInput);
                            i++;
                        }

                        function addInput() {

                            var divInputs = document.getElementById("inputs");
                            var newInput = document.createElement("div");
                            newInput.innerHTML = `<br><input style="width: 200px;height:30px" class="input-reponse" type="texte" name="rep" id="texte"><img src="Images/Icônes/ic-supprimer.png" alt="">`;
                            divInputs.appendChild(newInput);
                            }


                        function addInputMultiple() {

                            var divInputs = document.getElementById("inputs");
                            var newInput = document.createElement("div");
                            newInput.innerHTML = `<br><input style="width: 200px;height:30px" class="input-reponse" type="texte" name="reponse[${j}]" id="texte">
                            <input type="checkbox" name="vraixreponse[${j}]" id="simple"><img src="Images/Icônes/ic-supprimer.png" alt="">`;
                            divInputs.appendChild(newInput);
                            j++;

                            }

                        function add(){

                                    var type = document.getElementById("typereponse");
                                    if (type.value == 'multiple') {
                                    return addInputMultiple();
                                    } else if (type.value == 'simple') {
                                    return addInputSimple();
                                    } else {
                                    return addInput();
                                    }
                                }

                        let question = document.querySelector("#question");
                        let questioninf = document.querySelector("#questioninf");
                                
                        let score = document.querySelector("#score");
                        let scoreinf = document.querySelector("#scoreinf");

                        let typereponse = document.querySelector("#typereponse");
                        let typereponseinf = document.querySelector("#typereponseinf");

                        function validQuestion() {  
                                if (question.value === "") {
                                    questioninf.innerHTML = "champ obligatoire"
                                }
                            }
                        function validScore() {  
                                if (score.value === "") {
                                    scoreinf.innerHTML = "champ obligatoire"
                                }
                            }
                        function validTypereponse() {  
                                if (typereponse.value === "") {
                                    typereponseinf.innerHTML = "champ obligatoire"
                                }
                            }
                    </script>
                    </div>
                    </div>
            </div>
       </form>
</body>
</html>
