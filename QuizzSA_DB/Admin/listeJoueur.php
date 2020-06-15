<?php
session_start();
require_once('liste.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page connexion</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/Style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<form action="" method="POST">
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
            <h1 class="text-center">CRÉER ET PARAMÉRTER VOS QUIZZ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3" style="background-color:white;">
                <div class="row bg-white">
                    <div class="col-6">
                        <img src= "Images/<?php echo $_SESSION['image'];?>" alt="" id='output_image'>
                    </div>
                    <div class="col-6">
                        <?php echo "<br>".$_SESSION['prenom'];
                        echo "<br><br>".$_SESSION['nom']; ?>
                    </div>
                </div>
                <div class="row bg-white">
                    <div class="col-12 mt-3" > 
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="admin.php" role="tab"  aria-selected="false">Liste Questions<img class="float-right" src="../style/Images/Icônes/ic-liste.png" alt=""></a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="insAdmin.php" role="tab"  aria-selected="false">Créer Admin<img class="float-right" src="../style/Images/Icônes/ic-ajout.png" alt=""></a>
                        <a class="nav-link " style="background-color:#C4C4C4;" id="v-pills-messages-tab" data-toggle="pill" href="listeJoueur.php" role="tab"  aria-selected="true">Liste joueurs<img class="float-right" src="../style/Images/Icônes/ic-liste-active.png" alt=""></a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="creerquestion.php" role="tab"  aria-selected="false">Créer Questions<img class="float-right" src="../style/Images/Icônes/ic-ajout.png" alt=""></a>
                    </div>
                    </div>
        
                </div>
                <div class="row bg-white">
                    <div class="col-6 mb-3">
                        <button class="btn btn-danger"><a href="../deconnection.php"> Déconnexion</a></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" style="background-color:white;">
                    <div>
                            <div id="joueurModal" class="modal fade">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-body">
                                <label>Enter First Name</label>
                                <input type="text" name="prenom" id="nom" class="form-control" />
                                <br />
                                <label>Enter Last Name</label>
                                <input type="text" name="nom" id="nom" class="form-control" />
                                <br />
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id_joueur" id="id_joueur" />
                                <input type="submit" name="action" id="action" class="btn btn-success" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                            </div>
                            </div>
                    </div>
                    <div id="result">
                    </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
<script>
$(document).ready(function(){
 fetchUser(); 
 function fetchUser() 
 {
  var action = "Load";
  $.ajax({
   url : "liste.php", 
   method:"POST", 
   data:{action:action}, 
   success:function(data){
    $('#result').html(data); 
   }
  });
 }

 $('#modal_button').click(function(){
  $('#JoueurModal').modal('show'); 
  $('#prenom').val(''); 
  $('#nom').val(''); 
  $('.modal-title').text("Create New Records"); 
  $('#action').val('Create'); 
 });
 $('#action').click(function(){
  var prenom = $('#prenom').val(); 
  var nom = $('#nom').val(); 
  var id_joueur = $('#id_joueur').val();  
  var action = $('#action').val();  
  if(prenom != '' && nom != '') 
  {
   $.ajax({
    url : "liste.php",    
    method:"POST",     
    data:{prenom:prenom, nom:nom, id_joueur:id_joueur, action:action}, 
    success:function(data){
     alert(data);    
     $('#joueurModal').modal('hide');
     fetchUser();   
    }
   });
  }
  else
  {
   alert("Both Fields are Required"); 
  }
 });

 $(document).on('click', '.update', function(){
  var id = $(this).attr("id"); 
  var action = "Select";   
  $.ajax({
   url:"liste.php",  
   method:"POST",    
   data:{id:id, action:action},
   dataType:"json",   
   success:function(data){
    $('#joueurModal').modal('show');   
    $('.modal-title').text("Update Records"); 
    $('#action').val("Update");     
    $('#id_joueur').val(id_joueur);     
    $('#prenom').val(data.prenom); 
    $('#nom').val(data.nom);  
   }
  });
 });

 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id"); 
  if(confirm("Are you sure you want to remove this data?")) 
   var action = "Delete"; 
   $.ajax({
    url:"liste.php",    
    method:"POST",     
    data:{id:id, action:action}, 
    success:function(data)
    {
     fetchUser();    
     alert(data);    
    }
   })
  }
  else  
  {
   return false; 
  }
 });
});
</script>
