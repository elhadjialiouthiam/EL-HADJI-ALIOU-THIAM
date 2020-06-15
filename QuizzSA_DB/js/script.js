//el hadji aliou thiam
//fonction pour upload et affichage image
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };

        
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
  
            let prenom = document.querySelector("#prenom");
            let prenominf = document.querySelector("#prenominf");
            console.log(prenom);
            
            let nom = document.querySelector("#nom");
            let nominf = document.querySelector("#nominf");
            
            let login = document.querySelector("#login");
            let logininf = document.querySelector("#logininf");
            
            let password = document.querySelector("#mdp");
            let passwordinf = document.querySelector("#mdpinf");
            
            let cpassword = document.querySelector("#cmdp");
            let cpasswordinf = document.querySelector("#cmdpinf");
            
            let btnSumbmit = document.querySelector("#btnSumbmit");
            
            
            
            function validPrenom() {  
                if (prenom.value === "") {
                    prenominf.innerHTML = "champ obligatoire"
                }
            }
            function validNom() {
                if (nom.value === "") {
                    nominf.innerHTML = "champ obligatoire"
                } 
            }
            function validLogin() {
                if (login.value === "") {
                    logininf.innerHTML = "champ obligatoire"
                } 
            }
            function validMdp() {
                if (password.value === "") {
                    passwordinf.innerHTML = "champ obligatoire"
                } 
            }
            function validCmdp() {
                if (cpassword.value === "") {
                    cpasswordinf.innerHTML = "champ obligatoire"
                } 
            }

/*
    $('#btnValider').click(function(){
        const tel = $('#tel').val();
        const mnt = $('#mnt').val();
        //console.log($('form').serialize());
        if(tel == '' || mnt ==''){
            return false;
        }

        $.ajax({
                type: "POST",
                url: "http://localhost/LIVE_AJAX/data/saveVente.php",
                //data: $('form').serialize(),
                data: {tel:tel,mnt:mnt},
                dataType: "JSON",
                success: function (data) {
                   if(data){
                       $('#table').load('pages/table',{date:1}); 
                      /* 
                      OU BIEN
                      $('#tbody').append(`
                        <tr class="text-center">
                            <td>nouvelleHeure</td>
                            <td>nouveauTel</td>
                            <td>nouveauMont</td>
                        </tr>
                    `)*/
                 /*  }
                }
            });
    })*/

